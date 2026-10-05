<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|min:5|max:200',
            'description' => 'required|string|min:10',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $project = Project::findOrFail($id);

        return view('projects.show', compact('project'));
    }

    
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

  public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|min:5|max:200',
            'description' => 'required|string|min:10',
        ]);

        $project = Project::findOrFail($id);

        $project->update($validatedData);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }

    public function trash()
    {
        $projects = Project::onlyTrashed()->get();

        return view('projects.trash', compact('projects'));
    }

    public function restore(string $id)
    {
        $project = Project::withTrashed()->findOrFail($id);

        $project->restore();

        return redirect()->route('projects.trash')
            ->with('success', 'Project berhasil dipulihkan.');
    }

    public function forceDelete(string $id)
    {
        $project = Project::withTrashed()->findOrFail($id);

        $project->forceDelete();

        return redirect()->route('projects.trash')
            ->with('success', 'Project berhasil dihapus permanen.');
    }


}