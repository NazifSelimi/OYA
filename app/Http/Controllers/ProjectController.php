<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OpenCall;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Project::with('image')->latest()->paginate(3);
        $openCalls = OpenCall::with('image')->latest()->paginate(3);
        return view('index', compact('projects', 'openCalls'));
    }
    public function allProjects()
    {
        $projects = Project::with('image')->get();
        return view('projects', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('project-details', compact('project'));
    }

}
