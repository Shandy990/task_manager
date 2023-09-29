<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksRequest;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $taskDraft = Task::latest()->where('status_id', 1)->paginate(5);
        $taskPublished = Task::latest()->where('status_id', 2)->paginate(5);
        $taskValidate = Task::latest()->where('status_id', 3)->paginate(5);
        $taskDone = Task::orderBy('deleted_at', 'desc')->paginate(5);

        return view('pages.tasks.index', compact('taskDraft', 'taskPublished', 'taskValidate', 'taskDone'));
    }

    public function create()
    {
        $users = User::all();
        $statuses = Status::all();
        return view('pages.tasks.create', compact('users', 'statuses'));
    }

    public function store(TasksRequest $request)
    {
        $tasksData = $request->all();
        $tasksData['published_at'] = now();

        Task::create($tasksData);

        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }

    public function show()
    {
        return view('pages.tasks.show');
    }

    public function edit(Task $task)
    {
        $users = User::all();
        $statuses = Status::all();

        return view('pages.tasks.edit', compact('task', 'users', 'statuses'));
    }

    public function update(TasksRequest $request,Task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task Edit Successfully');
    }
    
    public function destroy(Task $task)
    {
        $task->forceDelete();
        return redirect()->route('tasks.index')->with('success', "Task Deleted Succesfully");
    }
}
