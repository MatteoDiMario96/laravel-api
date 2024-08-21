@extends('layouts.back-office');


@section('page-title', 'Info' . ' ' . $project->name)

@section('main-content')

<div class="card text-bg-light">
    <div class="card-header">Project name: {{$project->name}}</div>
        @if (session('edit-project'))
            <div class="alert alert-success">
                {{session('edit-project')}}
            </div>
        @endif
        <div class="w-25">
            <img src="{{$project->image_url}}" class="card-img-top fluid" alt="...">
        </div>
    <div class="card-body">
        <h5 class="card-title">@foreach ($project->technologies as $technology )
            @if ($loop->last)
                {{$technology->name}}
            @else
                {{$technology->name}} -
            @endif
        @endforeach</h5>
        <strong><p class="card-text">Created in date: {{$project->project_created_at}}</p></strong>
        <p class="card-text">Note:{{$project->note}}</p>
        <p>{{$project->type->name}}</p>
        <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-success">Edit {{$project->name}}</a>
        <form action="{{route('admin.projects.softDelete', $project)}}" method="POST" class="d-inline-block forms-destroy">
            @csrf
            @method('DELETE')
            <button class="btn btn-warning">
                Delete  {{$project->name}}
            </button>
        </form>
        <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Go back to the project list</a>
    </div>

@endsection
