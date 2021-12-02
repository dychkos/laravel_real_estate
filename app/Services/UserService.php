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
            'role_id' => ["nullable","integer"],
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

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login($userData){
        $validated = Validator::make($userData,[
            'email' => 'required|string',
            'password' => 'required|min:6',
        ])->validate();

        $remember = $userData["remember_me"] ?? false;
        $credentials = array("email"=>$validated["email"],"password"=>$validated["password"]);

        return $this->userRepository->login($credentials,$remember);

    }


    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($userData){
        $userRepository = $this->userRepository;


        $validatedUser = Validator::make($userData,[
            'id' => ["required","integer"],
            'name' => ["required","string","max:25"],
            'image' => ["nullable","array"],
            'role_id' => ["nullable","integer"],
        ])->validate();

        return $userRepository->update($validatedUser);
    }

    public function delete($user_id)
    {
        return $this->userRepository->delete($user_id);
    }


}
