@extends('layouts.back-office')

@section('title-page', 'Trash personal project')

@section('script-js')

@endsection

@section('main-content')
<h1 class="text-center">
    Trash Project list
</h1>
<div>
    <div>
        @if (@session('perma-delete-message'))
            <div class="alert alert-success">
                {{session('delete-message')}}
                <a href="{{route('admin.projects.index')}}">See the project list</a>
            </div>


        @endif
    </div>
</div>
<table class="table table-success table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Project created in date :</th>
            <th scope="col">Programming languages used :</th>
            <th scope="col" class="text-center">Action</th>

        </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach ($projects as $project)


    <tr>
        <th scope="row">{{$project->id}}</th>
        <td>{{$project->name}}</td>
        <td>{{$project->project_created_at}}</td>
        <td>{{$project->languages_programming_used}}</td>
        <td class="text-center">
            <form action="{{route('admin.projects.restore', $project)}}" method="POST" class="d-inline-block form-restore" data-project-name="{{$project->name}}">
                @csrf
                @method('PATCH')
                <button class="btn btn-info btn-sm m-2">
                    Restore
                </button>
            </form>
            <form action="{{route('admin.projects.permaDelete', $project)}}" method="POST" class="d-inline-block forms-destroy"  data-project-name="{{$project->name}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm m-2">
                    Perma Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="row my-3">
    <a href="{{route('admin.projects.create')}}" class="btn btn-danger btn-xl col-12">Aggiungi alla lista un nuovo project</a>
</div>
@endsection
