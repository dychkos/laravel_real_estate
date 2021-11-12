<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store($userData)
    {
        $userRepository = $this->userRepository;

        $validatedUser = Validator::make($userData,[
            'name' => ["required","string","max:25"],
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) use ($userRepository) {
                    if ($userRepository->checkEmailExists($value)) {
                        $fail('This ' . $attribute. ' is already used.');
                    }
                },
            ],
            'password' => 'min:6|required',
            'confirm_password' => ['min:6','required']
        ])->validate();

        return $userRepository->store($validatedUser);
    }


}
