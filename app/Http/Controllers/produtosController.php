<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produtosController extends Controller
{
    public function showprodutos(){
        return view('dashboard.produtos');
    }
}
