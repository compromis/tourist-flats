<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'type' => ['in:tourist_flat,illegal_works'],
            'address_street' => 'nullable',
            'address_number' => 'nullable',
            'address_box' => 'nullable',
            'postal_code' => 'nullable',
            'email' => ['required', 'email'],
            'comments' => 'nullable',
            'picture' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:8192'],
        ]);

        $report = new Report;
        $report->coordinates = '';
        $report->type = $validatedData['type'];
        $report->email = $validatedData['email'];
        $report->address_street = '';
        $report->address_number = '';
        $report->address_box = '';
        $report->postal_code = '';
        $report->comments = $validatedData['comments'];

        if (request()->hasFile('picture')) {
            $picture = $request->file('picture');
            $path = $picture->storePublicly('pictures');
            $filename = str_replace('pictures/', '', $path);
            $this->createThumbnail($picture, $filename);
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

        return Storage::put('/thumbnails/' . $filenameParts[0] . '.jpg', $jpegThumbnail, 'public');
    }
}
