@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-success">Add New Project</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            @if($project->image)
                                <img src="{{ asset('storage/'.$project->image) }}" alt="Project Image" width="100" class="img-thumbnail">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">No projects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
