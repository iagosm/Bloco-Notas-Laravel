<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // get all Users 
        $user = User::where('username', $usuario)
        ->where('deleted_at', NULL)
        ->first();
        if(!$user || !password_verify($senha, $user->password)) {
            return redirect()->back()->withInput()->with('loginError', 'Usuário ou Senha incorretos.');
        }
        
        // update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
            ]
        ]);
        return redirect()->to('/');
    }
    
    public function logout()
    {
        // logout
        session()->forget('user');
        return redirect()->to('/login');
    }
}
