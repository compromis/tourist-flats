<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\City;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function list(City $city)
    {
        $reports = Report::select(['coordinates','type','address_street'])
            ->where('confirmed', 1)
            ->where('city_id', $city->id)
            ->groupBy(['coordinates', 'type', 'address_street'])
            ->get();

        return $reports;
    }

    public function geojson(City $city, String $type)
    {
        $reports = Report::selectRaw('coordinates, type, address_street, COUNT(id) AS count')
            ->where('confirmed', 1)
            ->where('city_id', $city->id)
            ->where('type', $type)
            ->groupBy(['coordinates', 'type', 'address_street'])
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => $reports->map(function ($report) {
                return [
                    'type' => 'Feature',
                    'properties' => [
                        'type' => $report->type,
                        'address_street' => $report->address_street,
                        'count' => $report->count
                    ],
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => explode(',', $report->coordinates)
                    ]
                ];
            })
        ];

        return $geojson;
    }

    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'city_id' => ['required'],
            'type' => ['in:tourist_flat,illegal_works'],
            'coordinates' => ['required'],
            'address_street' => ['required'],
            'address_number' => ['nullable'],
            'address_box' => ['nullable'],
            'email' => ['required', 'email'],
            'comments' => ['nullable'],
            'picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:8192'],
            'consent' => ['accepted'],
            'checked' => ['accepted']
        ]);

        $report = new Report;
        $report->city_id = $validatedData['city_id'];
        $report->coordinates = $validatedData['coordinates'];
        $report->type = $validatedData['type'];
        $report->email = $validatedData['email'];
        $report->address_street = $validatedData['address_street'];
        $report->address_number = $validatedData['address_number'];
        $report->address_box = $validatedData['address_box'];
        $report->postal_code = '';
        $report->comments = $validatedData['comments'];

        if (request()->hasFile('picture')) {
            $picture = $request->file('picture');
            $path = $picture->storePublicly('pictures');
            $filename = str_replace('pictures/', '', $path);
            // $this->createThumbnail($picture, $filename);
            $report->picture = $filename;
        }

        $report->save();

        return $report;
    }

    private function createThumbnail($picture, $filename)
    {
        $manager = new ImageManager(Driver::class);
        $thumbnail = $manager->read($picture->getRealPath());
        $thumbnail->scaleDown(width: 800);
        $jpegThumbnail = $thumbnail->toJpeg(70);
        $filenameParts = explode('.', $filename);

        return Storage::putFile('/thumbnails/' . $filenameParts[0] . '.jpg', $jpegThumbnail, 'public');
    }
}
