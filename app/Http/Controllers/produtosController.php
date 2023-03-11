<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\fornecedores;
use App\Models\teste;


use Illuminate\Http\Request;

class produtosController extends Controller
{
    public function showprodutos(){
        return view('dashboard.produtos');
    }
    public function showteste(){
        return view('dashboard.teste');
    }
    public function showaddprodutos(){
        $fornecedor = fornecedores::all();
        return view('dashboard.cadastroprodutos', compact('fornecedor'));
    }

    public function storeproduto(Request $request){
        $request->validate([
            'nome_produto' => 'required|string|max:255',
            'categoria_id' => 'required|integer',
            'fornecedor_id' => 'required|integer',
            'quantidade' => 'required|integer',
            'marca' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'tipo_entrega' => 'required|string|max:255',
            'tipo_pagamento' => 'required|string|max:255',
            'valor_unitario' => 'required|string|max:255',
            'valor_total' => 'required|string|max:255'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $role_id
        ]);



        $produto = new Produto([
            'nome_produto' => $request->input('nome_produto'),
            'quantidade' => $request->input('quantidade'),
            'marca' => $request->input('marca'),
            'descricao' => $request->input('descricao'),
            'tipo_entrega' => $request->input('tipo_entrega'),
            'tipo_pagamento' => $request->input('tipo_pagamento'),
            'valor_unitario' => $request->input('valor_unitario'),
            'valor_total' => $request->input('valor_total'),
        ]);


        $categoria = Categoria::findOrFail($request->categoria_id);
        $fornecedor = fornecedores::findOrFail($request->fornecedor_id);

        $produto->categoria()->associate($categoria);
        $produto->fornecedor()->associate($fornecedor);

        DB::transaction(function () use ($produto, $categoria, $fornecedor) {
            $produto->save();
            $categoria->categoria_id()->attach($categoria);
            $fornecedor->fornecedor_id()->attach($fornecedor);
        });
        $produto->save();

        return redirect()->route('produtos');
    }

    public function teste(Request $request){
        $request->validate([
            'nome_produto' => 'required|string|max:255'
        ]);

        $teste = new teste();

        $teste->nome_produto = $request->nome_produto;

        $teste->save();

        return redirect()->route('register');
    }
}
