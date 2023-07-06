@extends('admin.layouts.base')

@section('contents')
<div class="container-create">
  <h1>Edit Project</h1>

    <form method="POST" action="{{ route('admin.projects.update', ['project' => $project->id]) }}" class="form-create">
        {{-- input nascosto che arriva al server --}}
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
            <div class="invalid-feedback">
            @error('title') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="project_image" class="form-label">image url</label>
            <input class="form-control @error('project_image') is-invalid @enderror" id="project_image" rows="3" name="project_image" value="{{ old('project_image', $project->project_image) }}">
            <div class="invalid-feedback">
                @error('project_image') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="url_github" class="form-label">url_github</label>
            <input type="text" class="form-control @error('url_github') is-invalid @enderror" id="url_github" name="url_github" value="{{ old('url_github', $project->url_github) }}">
            <div class="invalid-feedback">
                @error('url_github') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="project_description" class="form-label">project_description</label>
            <input project_description="text" class="form-control @error('project_description') is-invalid @enderror" id="project_description" name="project_description" value="{{ old('project_description', $project->project_description) }}">
            <div class="invalid-feedback">
                @error('project_description') {{ $message }} @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
      
  @endsection
</div>