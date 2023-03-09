<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class estoqueController extends Controller
{
    public function showestoque(){
        return view('dashboard.estoque');
    }

    
}
