<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginAccount(Request $request)
    {
        // form validation
        $request->validate(
        [
            'usuario' => 'required',
            'senha' => 'required'
        ],
        [
            'usuario1.required' => 'Valor errado'
        ]
        );
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');
        // dd($request);
        // return view('login');
    }
    
    public function logout()
    {
        echo 'logout';
    }
}
