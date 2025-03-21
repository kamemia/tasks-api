<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Return all tasks
    public function index()
    {
        $sort = request()->input('sort');
        if ($sort) {
            $tasks = Task::orderBy($sort, 'desc')->paginate(10);
        } else {
            $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        }
        return response()->json($tasks, 200);
        
    }
   
    /**
     * Store a newly created resource in storage.
     */
    // Create a new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'nullable|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    // Return a single task
    public function show(string $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404); 
        }

        return response()->json($task, 200); 
    }

    /**
     * Update the specified resource in storage.
     */
    // Update a task
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404); 
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'nullable|in:low,medium,high',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);
        return response()->json($task, 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    // Delete a task
    public function destroy(string $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404); 
        }

        $task->delete();
        return response()->json(null, 204); // 204 No Content
    }
}