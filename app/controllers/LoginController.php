<?php namespace Controllers;

use Auth, Input;
use View, Response, Redirect;

class LoginController extends BaseController
{
    /**
     *  Show the login screen
     */ 
    public function index()
    {
        return View::make('login');
    }

    /**
     *  Login user
     */
    public function login()
    {
        $credentials = Input::all();

        if($user = Auth::attempt(["username" => $credentials["username"],
                                  "password" => $credentials["password"]]))
        {
            return Response::json($user);
        }

        return Response::json(['error' => true], 400);
    }

    /**
     *  Logout user
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }
}   