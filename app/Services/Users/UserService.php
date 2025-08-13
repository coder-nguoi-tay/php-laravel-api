<?php

namespace App\Services\Users;

use App\Enums\StatusCode;
use App\Repositories\UserRepository\UserInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Create a new user in the system
     *
     * This function accepts user information and saves it to the database through the repository.
     * Returns operation result message and status code.
     *
     * @param array $data Array containing user information to be created
     *    - 'name' (string): User's full name
     *    - 'email' (string): User's email address
     *    - 'password' (string): User's password (will be hashed if not already)
     *
     * @return array{messages: string, status: int} Operation result array
     *    - 'messages' (string): Result message
     *    - 'status' (int): Status code (0 for success)
     *
     * @throws \InvalidArgumentException If required fields are missing
     * @throws \RuntimeException If there's an error while saving data
     *
     * @example
     * // Create a new user
     * $result = $userService->createUser([
     *     'name' => 'John Doe',
     *     'email' => 'john@example.com',
     *     'password' => 'securepassword123'
     * ]);
     *
     * // Expected return:
     * // [
     * //     'status' => 0,
     * //     'messages' => 'Account created successfully!'
     * // ]
     */
    public function createUser(array $data): array
    {
        try {
            $this->userRepository->createUser([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            return [
                'status' => StatusCode::SUCCESS->value,
                'messages' => StatusCode::SUCCESS->message(),
            ];
        } catch (\Exception $e) {
            return [
                'status' => StatusCode::SERVER_ERROR->value,
                'messages' => StatusCode::SERVER_ERROR->message(),
            ];
        }
    }
}
