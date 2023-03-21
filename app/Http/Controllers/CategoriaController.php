<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Categoria;
use App\Models\Fornecedores;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedores::all();
        $categorias = Categoria::all();
        return view('dashboard.categoria.categoria', compact('fornecedores', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categoria.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required|string|max:255|unique:categorias,categoria,NULL,id'
        ], [
            'categoria.required' => 'O campo categoria é obrigatório.',
            'categoria.unique' => 'Categoria já cadastrada.'
        ]);

        $category = new Categoria(['categoria' => $request->input('categoria')]);
        $category->save();

        return redirect()->route('categoria.lista')->withErrors(['categoria' => 'Categoria já existente.']);
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
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria, $id)
    {
    $categoria = Categoria::findOrFail($id);

    $categoria->delete();

    return redirect()->route('showcategoria')->with('success', 'Usuário excluído com sucesso!');
    }
}
