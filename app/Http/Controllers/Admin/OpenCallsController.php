<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpenCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class OpenCallsController extends Controller
{
    /**
     * Display a listing of all open calls.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $opencalls = OpenCall::with('image')->orderBy('published_at', 'desc')->get(); // Fetch all open calls with their images
        return view('opencalls.index', compact('opencalls')); // Return the view with open calls data
    }

    /**
     * Show the form for creating a new open call.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('opencalls.create'); // Return the view for creating a new open call
    }

    /**
     * Store a newly created open call in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:draft,published',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:2048', // Validate the image file
        ]);

        // Create a new open call
        $opencall = OpenCall::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'description' => $request->description,
            'status' => $request->status,
            'published_at' => $request->published_at
        ]);

        // Handle image upload if an image was uploaded
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $opencall->image()->create(['name' => $path]);
        }

        return redirect()->route('opencalls.index')->with('success', 'Open call created successfully.');
    }

    /**
     * Display the specified open call.
     *
     * @param \App\Models\OpenCall $opencall
     * @return \Illuminate\View\View
     */
    public function show(OpenCall $opencall)
    {
        return view('opencalls.show', compact('opencall')); // Return the view for a single open call
    }

    /**
     * Show the form for editing the specified open call.
     *
     * @param \App\Models\OpenCall $opencall
     * @return \Illuminate\View\View
     */
    public function edit(OpenCall $opencall)
    {
        return view('opencalls.edit', compact('opencall')); // Return the view for editing an open call
    }

    /**
     * Update the specified open call in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OpenCall $opencall
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, OpenCall $opencall)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:draft,published',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:2048', // Validate the image file
        ]);

        // Update the open call
        $opencall->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'description' => $request->description,
            'status' => $request->status,
            'published_at' => $request->published_at
        ]);

        // Handle image upload if an image was uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($opencall->image()->exists()) {
                $oldImage = $opencall->image()->first();
                Storage::delete('public/' . $oldImage->name); // Ensure correct path
                $oldImage->delete();
            }

            // Store the new image
            $path = $request->file('image')->store('images', 'public');
            $opencall->image()->create(['name' => $path]);
        }

        return redirect()->route('opencalls.index')->with('success', 'Open call updated successfully.');
    }

    /**
     * Remove the specified open call from storage.
     *
     * @param \App\Models\OpenCall $opencall
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(OpenCall $opencall)
    {
        // Delete associated image
        if ($opencall->image()->exists()) {
            $oldImage = $opencall->image()->first();
            Storage::delete('public/' . $oldImage->name);
            $oldImage->delete();
        }

        $opencall->delete(); // Delete the open call
        return redirect()->route('opencalls.index')->with('success', 'Open call deleted successfully.');
    }
}
