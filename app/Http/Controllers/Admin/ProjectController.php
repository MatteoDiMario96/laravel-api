<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }
    public function show(Project $project){
        return view('admin.projects.show', compact('project'));
    }
    public function create(){
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }
    public function store(StoreProjectRequest $request){
        $data = $request->validated();
        $newProject = new Project($data);
        $newProject->save();
        if (isset($data['technologies'])) {
        $newProject->technologies()->sync($data['technologies']);
        }
        return redirect()->route('admin.projects.show', $newProject);
    }
    public function edit(Project $project){
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit',compact('project', 'types', 'technologies'));
    }
    public function update(UpdateProjectRequest $request, Project $project){
        $data = $request->validated();
        // Salva le tecnologie associate
        if (isset($data['technologies'])) {
        $project->technologies()->sync($data['technologies']);
        }
        $project->update($data);

        return redirect()->route('admin.projects.show', $project)->with('edit-project', $project->name . ' '. 'has been edited with success');
    }
    public function softDeleteIndex(){
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.trash-index', compact('projects'));
    }
    public function softDelete(Project $project){
        $project->delete();
        return redirect()->route('admin.projects.index')->with('delete-message', $project->name . ' '. 'has been DELETE with success');
    }
    public function permaDelete(string $id){
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();
        return redirect()->route('admin.projects.trash-index')->with('delete-message', $project->name . ' '. 'has been PERMANET DELETE with success');
    }
    public function restore(string $id){
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('admin.projects.index')->with('restore-message', $project->name . ' '. 'has been RESTORE with success');
    }
}
