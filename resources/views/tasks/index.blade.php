@extends('layouts.app')

@section('title')
    TM Add Tasks
@endsection

@section('content')
    <div class="container">
        <br>
        <br>
        <h1>Task Manager - Add Tasks</h1>
        <br>
        <a href="{{ route('projects.index')  }}" class="btn btn-sm btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            Add Projects
        </a>
        <br>
        <br>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="name" placeholder="Task name" required>
            <br>
            <select name="project_id" class="form-control">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
                Add Task
            </button>
        </form>
        <br>
        <br>
        <h1>Sortable Tasks List (Drag Drop List)</h1>
        <br>
        <ul id="task-list">
            @foreach ($tasks as $d => $task)
                <li data-id="{{ $task->id }}">
                    <b>{{$d+1}} - </b>
                    {{ $task->name }} - Priority: {{ $task->priority }} - Project: {{ $task->project->name }}
                    <a class="btn btn-sm btn-success" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                            Delete
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $(function() {
            console.log("working");
            $("#task-list").sortable({
                update: function(event, ui) {
                    console.log("working1");
                    let taskIds = $(this).sortable('toArray', { attribute: 'data-id' });
                    $.post("{{ route('tasks.reorder') }}", { task_ids: taskIds, _token: "{{ csrf_token() }}" }, function(response) {
                        if(response.status === 'success') {
                            window.location.reload();
                            Swal.fire('Reordered!', 'Tasks have been reordered.', 'success');
                        }
                    });
                }
            });
        });
    </script>
@endpush
