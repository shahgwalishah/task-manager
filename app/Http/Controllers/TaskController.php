<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')->orderBy('priority','asc')->get();
        $projects = Project::all();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::where('id','=',$id)->with('project')->first();
        $projects = Project::all();
        return view('tasks.edit',[
            'task' => $task,
            'projects' => $projects,
            'project_id' => $task->project->id
        ]);
    }

    public function update(Request $request , $id)
    {
        Task::where('id','=',$id)->update([
            'name' => $request->name,
            'project_id' => $request->project_id
        ]);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function reorder(Request $request)
    {
        $taskIds = $request->input('task_ids');
        foreach ($taskIds as $index => $id) {
            Task::where('id', $id)->update(['priority' => $index + 1]);
        }
        return response()->json(['status' => 'success']);
    }
}
