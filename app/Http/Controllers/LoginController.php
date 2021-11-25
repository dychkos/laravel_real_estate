<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login.index');
    }


    public function store(UserService $userService,Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $userService->login($request->all());
            $request->session()->regenerate();
        }catch (ValidationException $exception){
            return back();
        }
        return redirect()->route('user.houses');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
