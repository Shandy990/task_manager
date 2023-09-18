<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('pages.tasks.index', compact('tasks'));
    }

    public function create()
    {
        // 
    }

    public function show()
    {
        // 
    }

    public function edit()
    {
        // 
    }
}
