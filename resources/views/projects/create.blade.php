@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Project</h2>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @include('projects.form')
        <br><button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
