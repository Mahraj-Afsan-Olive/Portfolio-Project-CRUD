<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'project_url' => $request->project_url,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.index');
    }

    public function show(Project $project) {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project) {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project) {
        $request->validate([
            'title' => 'required',
            'status' => 'required'
        ]);

        $data = $request->only('title', 'description', 'project_url', 'status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $project->update($data);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect()->route('projects.index');
    }
}

