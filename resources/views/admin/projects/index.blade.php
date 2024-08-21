@extends('layouts.back-office');

@section('page-title', 'Personal Project');

@section('main-content')
<h1 class="text-center">
    Project List
</h1>
<div>
    <div>
        @if (@session('delete-message') )
            <div class="alert alert-success">
                {{session('delete-message')}}
                <a href="{{route('admin.projects.trash-index')}}">See the trash backet</a>
            </div>
        @endif
        @if (@session('restore-message'))
        <div class="alert alert-success">
            {{session('restore-message')}}
            <a href="{{route('admin.projects.trash-index')}}">See the trash backet</a>
        </div>
        @endif
    </div>
</div>
<table class="table table-info table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">Name</th>
            <th scope="col">Technologies</th>
            <th scope="col">Project created in date :</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach ($projects as $project)


    <tr>
        <th scope="row">{{$project->id}}</th>
        <td>
            @if($project->type)
                {{$project->type->name}}
            @else
                <em>No type assigned</em>
            @endif
        </td>
        <td>{{$project->name}}</td>
        <td>
        @forelse ($project->technologies as $technology )
            @if ($loop->last)
                {{$technology->name}}
            @else
                {{$technology->name}},
            @endif

        @empty
            <td> No technologies </td>
        @endforelse
        </td>
        <td>{{$project->project_created_at}}</td>
        <td class="text-center">
            <a href="{{route('admin.projects.show', $project)}}" class="btn btn-info btn-sm m-2">Details</a>
            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-success btn-sm m-2">Edit</a>
            <form action="{{route('admin.projects.softDelete', $project)}}" method="POST" class="d-inline-block forms-destroy" data-animal-name="{{$project->name}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-warning btn-sm m-2">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="row my-3">
    <a href="{{route('admin.projects.create')}}" class="btn btn-danger btn-xl col-12">Add new project</a>
</div>
@endsection

