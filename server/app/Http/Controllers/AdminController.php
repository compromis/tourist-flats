<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        $reports = Report::all();
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
}
