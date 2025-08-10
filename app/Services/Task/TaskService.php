<?php

namespace App\Services\Task;

use App\Repositories\TaskRepository\Interfaces\TaskRepositoryInterface;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    /**
     * Summary of getAllTasks
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllTasks()
    {
        return $this->taskRepository->all();
    }
    /**
     * Summary of createTask
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createTask(array $data)
    {
        return $this->taskRepository->create($data);
    }
    /**
     * Summary of updateTask
     * @param array $data
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateTask(array $data, $id)
    {
        return $this->taskRepository->update($data, $id);
    }
    /**
     * Summary of deleteTask
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function deleteTask($id)
    {
        return $this->taskRepository->delete($id);
    }
}
