<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class produtoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        $produtos = Produto::all();
        return view('dashboard.produto.listaproduto', compact('fornecedores', 'produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        return view('dashboard.produto.createproduto', compact('fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nome' => 'required|string',
        'descricao' => 'required|string',
        'valor_unitario' => 'required|numeric|min:0',
        'valor_bruto' => 'required|numeric|min:0',
        'quantidade' => 'required|integer|min:0',
        'fornecedor_id' => 'required|integer',
        ]);

        $fornecedor_id = $request->input('fornecedor_id', 1);
        $produtos = new Produto([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'valor_unitario' => $request->input('valor_unitario'),
            'valor_bruto' => $request->input('valor_bruto'),
            'quantidade' => $request->input('quantidade'),
            'fornecedor_id' => $fornecedor_id
        ]);

        $fornecedor = Fornecedor::findOrFail($request->input('fornecedor_id'));

        DB::transaction(function () use ($produtos, $fornecedor_id) {
            $produtos->save();
            $produtos->fornecedor()->attach($fornecedor_id);
        });

        return redirect()->route('index.produto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
