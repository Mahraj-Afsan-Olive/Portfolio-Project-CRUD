@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">{{ $project->title }}</h2>

            <p class="text-muted mb-2">Status: <strong>{{ $project->status }}</strong></p>

            @if($project->image)
                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}" class="img-fluid rounded mb-3" style="max-width: 300px;">
            @else
                <p class="text-muted">No image available.</p>
            @endif

            <p class="card-text">{{ $project->description }}</p>

            @if($project->project_url)
                <p>
                    <a href="{{ $project->project_url }}" target="_blank" class="btn btn-outline-primary">
                        Visit Project
                    </a>
                </p>
            @endif

            <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back to Projects</a>
        </div>
    </div>
</div>
@endsection
