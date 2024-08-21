@extends('layouts.back-office');

@section('main-content')
<header class="m-5">
    <h1 class="text-center">
        @yield('type-of-crud')
    </h1>
</header>
<main class="m-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="@yield('form-action')" method="POST" class="row g-3 form-edit " data-project-name="@yield('value-name')">
        @csrf
        @yield('form-method')

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="@yield('value-name')">
        </div>
        <div class="col-6">
            <label for="inputAddress" class="form-label">Project created in date: </label>
            <input type="date" class="form-control" id="project-class" name="project_created_at" value="@yield('value-data')">
        </div>
        {{-- <div class="col-6">
            <label for="inputAddress2" class="form-label">languages_programming_used</label>
            <input type="text" class="form-control" id="project-languages_programming_used" name="languages_programming_used" value="@yield('value-programming-language')">
        </div>
        {{-- <div class="col-12">
            <label for="inputAddress2" class="form-label">Image Url</label>
            <input type="text" class="form-control" id="image-url" name="image_url" value="@yield('value-image')" class="mb-3">
        </div> --}}
        <div class="col-12">
            <label for="type-project" class="form-label">Select the Type of Project</label>
            <select class="form-select" aria-label="Default select example" name="type_id" >
                @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ old('type_id', isset($project) ? $project->type_id : '') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Note</label>
            <input type="text" class="form-control" id="project-note" name="note" value="@yield('value-note')">
        </div>
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($technologies as $technology)
            <input name="technologies[]" type="checkbox" class="btn-check" id="tag-check-{{$technology->id}}" autocomplete="off" value="{{ $technology->id }}"
            {{ in_array($technology->id, old('technologies',isset($project) ? $project->technologies->pluck('id')->toArray() : [])) ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="tag-check-{{$technology->id}}">{{$technology->name}}</label>
            @endforeach
          </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">@yield('type-of-crud')</button>
        </div>


    </form>
</main>
<footer>
    <a href="{{route('admin.projects.index')}}" class="btn btn-info">Torna alla lista progetti</a>
</footer>

@endsection
