@extends('layouts.form');

@section('type-of-crud')
    Create new project
@endsection

@section('form-action')
    {{route('admin.projects.store')}}
@endsection

@section('form-method')
    @method('POST')
@endsection
