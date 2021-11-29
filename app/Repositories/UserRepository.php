<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store($userData)
    {
        $model = new $this->model;
        return $model->create([
            'name' => $userData['name'],
            'role_id' => $userData['role_id'] ?? 1,
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function login($credentials,$remember){
        $model = $this->model->where('email',$credentials['email'])->first();
        if($model){
            if(!auth()->attempt($credentials,$remember)){
                throw ValidationException::withMessages(['email' => "Invalid email or password"]);
            }
            else{
                return $model;
            }
        }
        else{
            throw ValidationException::withMessages(['email' => "Invalid email or password"]);
        }
    }

    public function update($userData)
    {
        $model = new $this->model;
        $model = $model->find($userData['id']);

        if (!empty($userData['role_id'])){
            $model->role_id = $userData['role_id'];
        }

        if(!empty($userData["image"])){
            if($model->image()->get()->isNotEmpty()){
                $model->image()->delete();
            }
            $model->image()->create($userData['image'][0]);
        }

        $model->update($userData);
        return $model->fresh();
    }

    public function checkEmailExists($email): bool
    {
        $model = new $this->model;
        return $model->whereEmail($email)->count() > 0;
    }

    public function delete($user_id){
        $model = new $this->model;
        return $model->destroy($user_id);
    }

}
