<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    // GET /api/tasks
    public function index(): JsonResponse
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return response()->json(['data' => $tasks], 200);
    }


    // POST /api/tasks
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());
        return response()->json(['data' => $task], 201);
    }


    // PUT /api/tasks/{id}
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->validated());
        return response()->json(['data' => $task], 200);
    }


    // DELETE /api/tasks/{id}
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();
        return response()->json(null, 204);
    }
}