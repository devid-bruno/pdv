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
        $request->validate([
            'nome' => 'required|string|unique:fornecedores,nome,NULL,id',
            'email' => 'required|email|unique:fornecedores,email,NULL,id',
            'telefone' => 'required|string|unique:fornecedores,telefone,NULL,id',
            'descricao' => 'required|string|unique:fornecedores,descricao,NULL,id',
            'cnpj' => 'required|string|unique:fornecedores,cnpj,NULL,id',
            'endereco' => 'required|string|unique:fornecedores,endereco,NULL,id',
            'categoria_id' => 'required|integer'
        ]);

        $categoria_id =  $request->input('categoria_id', 1);
        $fornecedor = new Fornecedor([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'descricao' => $request->input('descricao'),
            'cnpj' => $request->input('cnpj'),
            'endereco' => $request->input('endereco'),
            'categoria_id' =>$categoria_id
        ]);

        $categoria = Categoria::findOrFail($request->input('categoria_id'));

        DB::transaction(function () use ($fornecedor, $categoria) {
            $fornecedor->save();
            $fornecedor->categorias()->attach($categoria);
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

        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:fornecedores,email,'.$fornecedor->id,
            'telefone' => 'nullable|min:6',
            'endereco' => 'required',
            'descricao' => 'required',
            'cnpj' => 'required',
            'categoria_id' => 'required|integer',
        ]);

        $fornecedor->categorias()->detach();
        $categorias = Categoria::findOrFail($validatedData['categoria_id']);

        $fornecedor->categorias()->attach($categorias);

        $fornecedor->save();

        return redirect()->route('showcategoria')->with('success', 'Usuário atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }
}
