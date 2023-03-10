<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\fornecedores;
use Illuminate\Http\Request;

class produtosController extends Controller
{
    public function showprodutos(){
        return view('dashboard.produtos');
    }
    public function showaddprodutos(){
        return view('dashboard.cadastroprodutos');
    }

    public function storeproduto(Request $request){
        $request->validate([
            'nome_produto' => 'required|string|max:255',
            'categoria_id' => 'required|integer',
            'fornecedor_id' => 'required|integer',
            'quantidade' => 'required|integer',
            'marca' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'tipo_entrega' => 'required|string|max:255'
        ]);

        $produto = new Produto();
        $produto->nome_produto = $request->nome_produto;
        $produto->quantidade = $request->quantidade;
        $produto->marca = $request->marca;
        $produto->descricao = $request->descricao;
        $produto->tipo_entrega = $request->tipo_entrega;

        $categoria = Categoria::findOrFail($request->categoria_id);
        $fornecedor = fornecedores::findOrFail($request->fornecedor_id);

        $produto->categoria()->associate($categoria);
        $produto->fornecedor()->associate($fornecedor);

        $produto->save();

        return redirect()->route('produtos');


    }
}
