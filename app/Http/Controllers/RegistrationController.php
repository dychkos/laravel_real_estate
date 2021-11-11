<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request){
        return view("registration.index");
    }

    public function store(Request $request){
        dd($request->all());
        return "Запрос на регистрацию!";
    }
}
