<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponse;

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return $this->response(
                'Authorizaed',
                200,
                [
                    'token' => $request->user()->createToken('invoice')->plainTextToken
                ]
            );
        }

        return $this->response('Not Authorized', 403);
    }

    public function logout()
    {

    }
}
