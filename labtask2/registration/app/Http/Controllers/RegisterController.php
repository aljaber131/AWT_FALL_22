<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function GetRegisterPage()
    {
        return view("register");
    }

    public function RegisterUser(Request $request){
        $this->validate($request,
        [
            "name"=>"required|string",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6|max:12|confirmed",
            "confirm_password"=>"required|min:6|max:12",
            "age"=> "required|numeric|digits_between:0,9"
        ],
        [
            "name.required"=>"Name is required",
            "name.string"=>"Name must be string",
            "email.required"=>"Email is required",
            "email.email"=>"Email is invalid",
            "email.unique"=>"Email must be unique",
            "password.required"=>"Password is required",
            "password.max"=>"Password must not be bigger than 12 characters",
            "password.min"=>"Password must be at least 6 characters",
            "password.confirmed"=>"Password and confirm password must be same",
            "confirm_password.required"=>"Confirm password is required",
            "confirm_password.max"=>"Confirm password must not be bigger than 12 characters",
            "confirm_password.min"=>"Confirm pasword must be at least 6 chracters",
            "age.required"=>"Age is required",
            "age.numeric"=>"age must be numeric"
        ]);
        dd($request->all());
    }
}
