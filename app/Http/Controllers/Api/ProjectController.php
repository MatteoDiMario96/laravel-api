<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        //RITORNA UN JSON CON X COSE
        $projects = Project::paginate(3);
        $projects->loadMissing("type", "technologies");
        return response()->json(
            [
                "success" => true,
                "results" => $projects
            ]);
    }

    public function show(Project $project){
        //RITORNA UN JSON CON Y COSE
        $project->loadMissing("type", "technologies");
        return response()->json(
            [
                "success" => true,
                "results" => $project
            ]);
    }

    public function userSearch(Request $request){
        //RITORNA UN JSON CON Y COSE
        $data = $request->all();
        if (isset($data['project_name'])) {
            $searchedNameProject = Project::with("type", "technologies")->where("name", "LIKE", "%" . ($data["project_name"] ?? "") . "%")->get();
            return response()->json(
                [
                    "success" => true,
                    "results" => $searchedNameProject
                ]);
        } elseif (isset($data['project_created_at'])) {
            $searchedDateProject = Project::with("type", "technologies")->where("project_created_at", "LIKE", "%" . ($data["project_created_at"] ?? "") . "%")->get();
            return response()->json(
                [
                    "success" => true,
                    "results" => $searchedDateProject
                ]);
        } elseif (isset($data['technology_name'])) {
            $searchTechnology = Technology::with("projects")->where("name", "LIKE", "%" . ($data["technology_name"] ?? "") . "%")->get();
            return response()->json(
                [
                    "success" => true,
                    "results" => $searchTechnology
                ]);
        } elseif (isset($data['type_name'])) {
            $searchType = Type::with("projects")->where("name", "LIKE", "%" . ($data["type_name"] ?? "") . "%")->get();
            return response()->json(
                [
                    "success" => true,
                    "results" => $searchType
                ]);
        }
    }
}
