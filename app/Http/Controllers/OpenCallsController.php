<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OpenCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OpenCallsController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function allOpenCalls()
    {
        $openCalls = OpenCall::with('image')->get();
        return view('news', compact('openCalls'));
    }

    public function show(OpenCall $openCall)
    {
        return view('news-details', compact('openCall')); // Return the view for a single open call
    }

}
