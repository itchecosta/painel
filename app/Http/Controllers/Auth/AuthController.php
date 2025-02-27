<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SegUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ], [
            'email.required' => 'E-mail é obrigatório',
            'email.email' => 'Insira um e-mail válido',
            'senha.required' => 'Senha é obrigatória',
        ]);

        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('senha')])) {
            return redirect()->route('login')->with('error', 'E-mail ou senha inválidos');
        }

        return redirect()->route('painel')->with('success', 'Logado com sucesso');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout realizado com sucesso');
    }
}
