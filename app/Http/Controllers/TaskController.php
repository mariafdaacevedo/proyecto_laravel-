<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pending,completed',
        ]);

        $task = Task::create($request->all());

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task,
        ]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Task not found',
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully',
        ]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Task not found',
            ], 404);
        }

        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pending,completed',
        ]);

        $task->update($request->all());

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task,
        ]);
    }

    public function show()
{
    $tasks = Task::all();
    return view('tasks', ['tasks' => $tasks]);
}
}