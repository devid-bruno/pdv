<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendas;
use App\Models\Estoque;
use Illuminate\Support\Facades\DB;

class vendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.vendas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Valida os dados do formulário
    $request->validate([
        'id_produto' => 'required|integer',
        'nome_cliente' => 'required|string|max:255',
        'email_cliente' => 'required|email|max:255',
        'cpf_cnpj_cliente' => 'required|string|max:20',
        'telefone_cliente' => 'required|string|max:20',
        'endereco_cliente' => 'required|string|max:255',
        'forma_pagamento' => 'required|string|max:255',
        'quantidade' => 'required|integer|min:1'
    ]);

    // Busca as informações do produto no banco de dados
    $produto = Estoque::find($request->id_produto);

    // Verifica se o produto existe
    if (!$produto) {
        return redirect()->back()->withErrors(['Produto não encontrado']);
    }

    // Verifica se a quantidade desejada está disponível no estoque
    if ($produto->quantidade < $request->quantidade) {
        return redirect()->back()->withErrors(['Quantidade insuficiente em estoque']);
    }

    // Calcula o valor total da venda
    $valor_total_venda = $produto->preco * $request->quantidade;

    // Cria a nova venda
    $venda = new Venda;
    $venda->estoque_id = $produto->id;
    $venda->nome_cliente = $request->nome_cliente;
    $venda->email_cliente = $request->email_cliente;
    $venda->cpf_cnpj_cliente = $request->cpf_cnpj_cliente;
    $venda->telefone_cliente = $request->telefone_cliente;
    $venda->endereco_cliente = $request->endereco_cliente;
    $venda->forma_pagamento = $request->forma_pagamento;
    $venda->quantidade = $request->quantidade;
    $venda->valor_total = $valor_total_venda;
    $venda->save();

    // Atualiza a quantidade em estoque
    $produto->quantidade -= $request->quantidade;
    $produto->save();

    // Retorna para a página de vendas com uma mensagem de sucesso
    return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso');
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
