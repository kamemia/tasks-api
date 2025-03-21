<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
class TasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task()
    {
        $taskData = [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'priority' => 'high',
            'due_date' => '2025-03-21',
        ];

        // Create the task
        $response = $this->postJson('/api/tasks', $taskData);

        // Check if the task was created successfully
        $response->assertStatus(201);

        // Check if the task was created in the database
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function test_can_get_all_tasks()
    {
        // Create some tasks
        Task::create([
            'title' => 'Test Task 1',
            'description' => 'Test Description 1',
            'priority' => 'high',
            'due_date' => '2025-03-21',
        ]);

        Task::create([
            'title' => 'Test Task 2',
            'description' => 'Test Description 2',
            'priority' => 'medium',
            'due_date' => '2025-03-22',
        ]);

        // Get all tasks
        $response = $this->getJson('/api/tasks');

        // Check if the response status is 200
        $response->assertStatus(200);

    }
    
    
    public function test_can_get_single_task()
    {
        // Create a task
        $task = Task::create([
            'title' => 'Test Task',
            'description' => 'Test Description',
            'priority' => 'high',
            'due_date' => '2025-03-21',
        ]);

        // Get the task
        $response = $this->getJson("/api/tasks/{$task->id}");

        // Check if the response status is 200
        $response->assertStatus(200);

        // Check if the response contains the correct task data
        $response->assertJson([
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
        ]);
    }
}
