<?php

namespace App\Http\Controllers;

use App\Models\frequentIssue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class frequentIssueController extends Controller
{
    public function index()
    {
        $frequent_issues = frequentIssue::all();

        return view('home.index', ['frequent_issues' => $frequent_issues]);
    }
}
