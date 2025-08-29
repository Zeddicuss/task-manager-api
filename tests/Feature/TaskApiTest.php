<?php

namespace Tests\Feature;
use App\Models\Task; 


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;


    public function test_create_and_list_and_update_and_delete(): void
    {
        // create
        $this->postJson('/api/tasks', [
        'title' => 'Test Task',
        'description' => 'desc',
        ])->assertStatus(201)
        ->assertJsonPath('data.title', 'Test Task');


        // list
        $this->getJson('/api/tasks')->assertStatus(200)->assertJsonCount(1, 'data');


        $taskId = Task::first()->id;


        // update
        $this->putJson('/api/tasks/' . $taskId, ['status' => 'completed'])->assertStatus(200)
        ->assertJsonPath('data.status', 'completed');


        // delete
        $this->deleteJson('/api/tasks/' . $taskId)->assertStatus(204);
    }
}