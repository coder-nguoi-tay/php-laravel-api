<?php

namespace App\Repositories\TaskRepository;
use App\Models\Task;
use App\Repositories\BaseRepository;
use App\Repositories\TaskRepository\Interfaces\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function model()
    {
        return Task::class;
    }

    public function all()
    {
        return $this->model->paginate(5);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
