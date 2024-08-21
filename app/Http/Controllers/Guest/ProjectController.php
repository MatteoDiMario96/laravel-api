<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    public function show(Project $project){
        return view('projects.show', compact('project'));
    }
    public function create(){
        return view('project.create');
    }
    public function store(StoreProjectRequest $request){
        $data = $request->validated();
        $newProject = new Project($data);
        $newProject->save();
        return redirect()->view('projects.show', $newProject);
    }
    public function edit(){
        return view('project.edit');
    }
    public function update(UpdateProjectRequest $request, Project $project){
        $data = $request->validated();
        $project->update($data);
        return redirect()->view('projects.show', $project);
    }
    public function softDeleteIndex(){
        $projects = Project::onlyTrashed()->get();
        return view('project.trash-index', compact('projects'));
    }
    public function softDelete(Project $project){
        $project->delete();
        return redirect()->view('projects.index');
    }
    public function permaDelete(string $id){
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();
        return redirect()->route('project.trash-index')->with('');
    }
    public function restore(string $id){
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('project.trash-index')->with('');
    }
}
