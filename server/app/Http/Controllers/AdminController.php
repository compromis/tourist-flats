<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Inertia\Inertia;
use Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $reports = Report::where('city_id', Auth::user()->city_id)->get();
        return Inertia::render('Dashboard', [
            'reports' => $reports
        ]);
    }

    public function update(Report $report, Request $request)
    {
        if($request->input('confirmed')) $report->confirmed = ($request->input('confirmed') == 'public') ? 1 : 0;
        if($request->input('observations')) $report->observations = $request->input('observations');
        if($request->input('comments')) $report->comments = $request->input('comments');
        $report->save();

        return to_route('dashboard');
    }

    public function export()
    {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=reports.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $reports = Report::where('city_id', Auth::user()->city_id)->get();

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');
    
            // Add CSV headers
            fputcsv($handle, [
                'ID',
                'Coordinates',
                'Type',
                'Email',
                'Address',
                'Picture',
                'Comments',
                'Remarks',
                'Confirmed',
                'Created_At'
            ]);
    
             // Fetch and process data in chunks
            Report::chunk(25, function ($reports) use ($handle) {
                foreach ($reports as $report) {
                // Extract data from each employee.
                $data = [
                    $report->id,
                    $report->coordinates,
                    $report->type,
                    $report->email,
                    $report->address_street . ', ' . $report->address_number . ', ' . $report->address_box,
                    ($report->picture) ? 'https://housing-reports.s3.eu-west-3.amazonaws.com/' . $report->picture : '',
                    ($report->comments)? $report->comments : '',
                    ($report->observations)? $report->observations : '',
                    $report->confirmed,
                    $report->created_at,
                ];
    
                // Write data to a CSV file.
                    fputcsv($handle, $data);
                }
            });
    
            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }
}
