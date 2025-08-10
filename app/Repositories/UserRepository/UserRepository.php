<?php

namespace App\Repositories\UserRepository;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserInterface
{
    public function model()
    {
        return User::class;
    }
    public function getUserByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
    public function createUser($data)
    {
        return $this->model->create($data);
    }
}