<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categoria.categoria');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categoria.createCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'categoria' => 'required|string|max:255|unique:categorias,categoria,NULL,id'
        ], [
            'categoria.required' => 'O campo categoria é obrigatório.',
            'categoria.unique' => 'Categoria já cadastrada.'
        ]);

        $category = new Categoria(['categoria' => $request->input('categoria')]);
        $category->save();

        return redirect()->route('produto.fornecedor')->withErrors(['categoria' => 'Categoria já existente.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
