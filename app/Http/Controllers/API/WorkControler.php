<?php

namespace App\Http\Controllers\API;

use App\Enums\ApiStatus;
use App\Http\Controllers\Controller;
use App\Services\Task\TaskService;
use Illuminate\Http\Request;

class WorkControler extends Controller
{
    public $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getList()
    {
        $data = $this->taskService->getAllTasks();

        return response()->json($data, ApiStatus::OK->value);
    }
    public function create(Request $request)
    {
        $param = $request->validated();

        $data = $this->taskService->createTask($param);

        return response()->json($data, ApiStatus::OK->value);
    }
}
