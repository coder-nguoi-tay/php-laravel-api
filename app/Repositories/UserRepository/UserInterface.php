<?php

namespace App\Repositories\UserRepository;

interface UserInterface
{
    public function createUser(array $data);
    public function getUserByEmail($email);
}