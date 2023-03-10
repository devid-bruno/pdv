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
        $users = User::all();
        return view('dashboard.register', compact('roles', 'users'));
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

        return redirect()->route('register')->with('success', 'Cadastro realizado com sucesso. Faça login para acessar sua conta.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function destroy($id){
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('register')->with('success', 'Usuário excluído com sucesso!');
    }

    public function edit($id)
{
    // Busca o usuário pelo id
    $user = User::findOrFail($id);

    $roles = Role::all();

    // Retorna a view de edição do usuário com o usuário encontrado
    return view('dashboard.edit', compact('user', 'roles'));
}

public function update(Request $request, $id)
{
    // Busca o usuário pelo id
    $user = User::findOrFail($id);

    // Valida os dados do formulário
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'password' => 'nullable|min:6|confirmed',
        'role_id' => 'required|integer',
    ]);

    // Atualiza as informações do usuário
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];

    if (!empty($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']);
    }
// Remove a associação atual do usuário com a role
$user->roles()->detach();

// Adiciona a nova associação do usuário com a role
$role = Role::findOrFail($validatedData['role_id']);
$user->roles()->attach($role);

$user->save();

    // Redireciona para a página de listagem de usuários com mensagem de sucesso
    return redirect()->route('register')->with('success', 'Usuário atualizado com sucesso!');
}

}
