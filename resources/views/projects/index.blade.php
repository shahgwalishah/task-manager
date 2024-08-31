@extends('layouts.app')

@section('title')
    TM - Add Projects
@endsection

@section('content')
    <div class="container">
        <br>
        <br>
        <h1>Task Manager Add Projects</h1>
        <br>
        <a href="{{ route('tasks.index')  }}" class="btn btn-sm btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            Add Tasks
        </a>
        <br>
        <br>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="name" placeholder="Enter Project name" required>
            <br>
            <button type="submit" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
                Add Projects
            </button>
        </form>
        <br>
        <br>
        <h1>Projects List</h1>
        <br>
        <ul id="projects-list">
            @foreach ($projects as $d => $project)
                <li data-id="{{ $project->id }}">
                    <b>{{$d+1}} -</b>
                    {{ $project->name }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
