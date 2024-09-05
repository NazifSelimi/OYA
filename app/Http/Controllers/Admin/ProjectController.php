<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $projects = Project::with('image')->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:planned,in-progress,completed',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048', // Adjust image validation as needed
        ]);

        $project = Project::create($request->only(['title', 'summary', 'description', 'status', 'published_at']));

        // Handle image upload if an image was uploaded
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $project->image()->create(['name' => $path]);
        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:planned,in-progress,completed',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048', // Adjust image validation as needed
        ]);

        $project->update($request->only(['title', 'summary', 'description', 'status', 'published_at']));

        // Handle image upload if an image was uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image()->exists()) {
                $oldImage = $project->image()->first();
                Storage::delete('public/' . $oldImage->name); // Ensure correct path
                $oldImage->delete();
            }

            // Store the new image
            $path = $request->file('image')->store('images', 'public');
            $project->image()->create(['name' => $path]);
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }
    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        // Delete associated images
        foreach ($project->images as $image) {
            Storage::delete('public/images/' . $image->name);
            $image->delete();
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
