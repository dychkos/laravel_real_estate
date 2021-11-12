<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index(Request $request){
        return view("registration.index");
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserService $userService, Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->all();
        $user = $userService->store($data);

        Auth::loginUsingId($user->id);

        return redirect()->route("user.houses");
    }
}
