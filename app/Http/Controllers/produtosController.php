<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produtosController extends Controller
{
    public function produtos(){
        return view('dashboard.produtos');
    }
}
