@extends('layouts.form');

@section('type-of-crud')
    Edit {{$project->name}}
@endsection

@section('form-action')
    {{route('admin.projects.update', $project)}}
@endsection

@section('value-name')
    {{old('name',$project->name)}}
@endsection

@section('value-data')
{{ old('project_created_at', $project->project_created_at) }}
@endsection
@section('value-programming-language')
    {{old('languages_programming_used',$project->languages_programming_used)}}
@endsection

@section('value-image')
    {{old('image_url',$project->image_url)}}
@endsection

@section('value-note')
    {{old('note',$project->note)}}
@endsection


@section('form-method')
    @method('PUT')
@endsection

