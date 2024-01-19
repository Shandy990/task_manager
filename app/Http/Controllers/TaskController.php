<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksRequest;
use App\Models\Image;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function landing(Task $task)
    {

        return view('pages.tasks.landing-page');
    }

    public function index(Task $task)
    {
        $taskQuery = Task::query()->when(request()->search, function ($query) {
            // dd("test");
            $search = request()->search;
            $query->where('title', 'like', "%{$search}%");
        });
        
        $taskDraft = (clone $taskQuery)->latest()->where('status_id', 1)->paginate(5);
        $taskPublished = (clone $taskQuery)->latest()
            ->when(!auth()->user()->is_admin, function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->where('status_id', 2)
            ->paginate(5);
        $taskValidate = (clone $taskQuery)->latest()
            ->when(!auth()->user()->is_admin, function ($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->where('status_id', 3)
            ->paginate(5);
        $taskDone = (clone $taskQuery)->orderBy('deleted_at', 'desc')
            ->withTrashed()
            ->paginate(5);

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

        if (Gate::denies('is_admin')) {
            abort(403);
        }

        $fileName = "Task-Image-" . time() . "image";

        if ($request->hasFile('image')) {
            $image = new Image();
            $image->folder = "public/tasks";
            $image->file = $request->image;
            $image->saveFile($fileName);
            $image->description = $request->title;
            $image->path = $image->getFilePath();
            $image->save();

            $tasksData = array_merge($request->all(), ['image_id' => $image->id]);
            $tasksData['published_at'] = now();
        }
        
        Task::create($tasksData);

        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }

    public function show()
    {
        return view('pages.tasks.show');
    }


    public function edit(Request $request, Task $task)
    {
        if (Gate::denies('pic_task_access', $task)) {
            abort(403);
        }

        $users = User::all();
        $statuses = Status::all();

        return view('pages.tasks.edit', compact('task', 'users', 'statuses'));
    }

    public function update(TasksRequest $request, Task $task)
    {
        if (Gate::denies('pic_task_access', $task)) {
            abort(403);
        }
        if ($request->user()?->is_admin) {
            $data = $request->all();
            $fileName  = "task-image" . time();
            
            if ($request->hasFile('image')) {
                $task->image->delete();

                $image = new Image();
                $image->folder = "public/tasks";
                $image->file = $request->image;
                $image->saveFile($fileName);
                $image->description = $request->title;
                $image->path = $image->getFilePath();
                $image->save();

                $data['image_id'] =  $image->id;
            }
        } else {
            $data = $request->only('note');
        }
        $task->update($data);

        if (!$request->user()?->is_admin) {
            $published_id = Status::where('title', 'published')->first()->id;

            if ($task->status_id == $published_id) {
                $task->status_id = Status::where('title', 'validate')->first()->id;
                $task->save();
            }
        } else {
            if ($task->status_id == Status::where('title', 'done')->first()->id) {
                $task->delete();
            };
        }


        return redirect()->route('tasks.index')->with('success', 'Task Edit Successfully');
    }

    public function destroy($task)
    {
        Task::withTrashed()
            ->where('id', $task)
            ->first()
            ->forceDelete();
        return redirect()->route('tasks.index')->with('success', "Task Deleted Succesfully");
    }
}
