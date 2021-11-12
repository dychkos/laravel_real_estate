<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store($userData)
    {
        $user = new $this->user;
        return $user->create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);
    }

    public function checkEmailExists($email): bool
    {
        $user = new $this->user;
        return $user->whereEmail($email)->count() > 0;
    }

}
