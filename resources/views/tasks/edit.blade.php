@extends('layouts.app')

@section('title')
    TM Edit Task
@endsection

@section('content')
    <div class="container">
        <br>
        <br>
        <h1>Task Manager - Edit Task</h1>
        <br>
        <a class="btn btn-sm btn-primary" href="{{ route('tasks.index')  }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
            </svg>
            Back
        </a>
        <br>
        <br>
        <form action="{{ route('tasks.update.data',[$task->id]) }}" method="POST">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Edit name" value="{{$task->name}}" required>
            <br>
            <select name="project_id" class="form-control">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" @if($project_id) @if($project_id === $project->id) selected @endif  @endif>{{ $project->name }}</option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                </svg>
                Edit Task
            </button>
        </form>
    </div>
@endsection
