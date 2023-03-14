<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('dashboard.fornecedor.createFornecedor', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nome' => 'required|string|unique:fornecedores,nome,NULL,id',
            'email' => 'required|email|unique:fornecedores,email,NULL,id',
            'telefone' => 'required|string|unique:fornecedores,telefone,NULL,id',
            'descricao' => 'required|string|unique:fornecedores,descricao,NULL,id',
            'cnpj' => 'required|string|unique:fornecedores,cnpj,NULL,id',
            'endereco' => 'required|string|unique:fornecedores,endereco,NULL,id',
            'categoria_id' => 'required|integer'
        ]);

        $fornecedor = new Fornecedor([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'descricao' => $request->input('descricao'),
            'cnpj' => $request->input('cnpj'),
            'endereco' => $request->input('endereco')
        ]);

        $categoria_id = Categoria::findOrFail($request->input('categoria_id'));

        DB::transaction(function () use ($fornecedor, $categoria_id) {
            $fornecedor->save();
            $fornecedor->categorias()->attach($categoria_id);
        });

        return redirect()->route('produto.fornecedor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->nome = $request->input('nome');
        $fornecedor->email = $request->input('email');
        $fornecedor->telefone = $request->input('telefone');
        $fornecedor->descricao = $request->input('descricao');
        $fornecedor->cnpj = $request->input('cnpj');
        $fornecedor->endereco = $request->input('endereco');

        $categorias = $request->input('categorias'); // Assume que o formulário envia as categorias selecionadas como um array

        $fornecedor->categorias()->sync($categorias); // Atualiza as categorias do fornecedor

        $fornecedor->save();

        return redirect()->route('showcategoria');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }
}
