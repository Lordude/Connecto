<?php

namespace App\Http\Controllers;

use App\Models\FrequentIssue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class FrequentIssueController extends Controller
{
    public function index()
    {
        $frequent_issues = FrequentIssue::all();
        $reports = Report::all();

        return view('home.index', ['frequent_issues' => $frequent_issues, 'reports' => $reports]);
    }
}
