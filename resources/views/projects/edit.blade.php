@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Project</h2>
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('projects.form', ['project' => $project])
        <br><button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
