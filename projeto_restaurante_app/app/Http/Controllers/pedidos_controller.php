<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;

class pedidos_controller extends Controller
{
    //
    public function pedidos(){

        return view('pedidos');

    }

    /* pegar dados do input e salvar */
    public function salvar(Request $request){

        $request->validate([

            'nome' => 'required|min:5',
            'refeição' => 'required|min:5',
            'bebida' => 'required|min:5',
            'pagamento' => 'required'

        ],
        [
            'required' => 'Insira o(a) :attribute por favor',
            'min' => 'Os dados precisam ter no mínimo 10 caracteres'
        ]
    
    );
        //return dd($request->all());
        pedidos::create($request->all());

    }
}
