<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function  index(Request $request)
    {
        $task = Task::qery();
        if ($request->has('status')) {
            $task->where('status', $request->status);
        }
        return view('tasks.index', ['tasks' => $task->get()]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatorData = $request->validate([
            'title' => 'required|max:255',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date'
        ]);
        $task = Task::create($validatorData);
        return view('tasks.index', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }
    public function  update(Request $request ,Task $task)
    {
        $validatorData = $request->validate([
            'title' => 'required|max:255',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date'
        ]);
        $task->update($validatorData);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
