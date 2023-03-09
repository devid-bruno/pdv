<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function showlogin(){
        return view('login.login');
    }
    public function showregister(){
        if(Auth::check()){
        $roles = Role::all();
        return view('dashboard.register', compact('roles'));
        }
        return redirect()->route('login')->withErrors(['login' => 'Favor, fazer login.']);

    }

    public function showdashboard(){
        if(Auth::check()){
            return view('dashboard.home');
        }
        return redirect()->route('login')->withErrors(['login' => 'Favor, fazer login.']);

    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }
        return redirect()->route('login')->withErrors(['login' => 'Credenciais inválidas.']);
    }

    public function register(Request $request){
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|min:8',
        'role_id' => 'required|integer',
        ]);

        $role_id = $request->input('role_id', 1); // Define o valor padrão como 1 caso role_id não seja enviado pelo formulário
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $role_id
        ]);

        $role = Role::findOrFail($request->input('role_id'));


        DB::transaction(function () use ($user, $role) {
            $user->save();
            $user->roles()->attach($role);
        });

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso. Faça login para acessar sua conta.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
