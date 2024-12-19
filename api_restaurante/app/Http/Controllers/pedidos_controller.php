<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use App\Models\pagamento;
use Symfony\Component\Console\Input\Input;

class pedidos_controller extends Controller
{
    //
    public function pedidos(){

        $pagamento = pagamento::all();

        return view('pedidos', ['pagamento' => $pagamento]);

    }

    /* pegar dados do input e salvar */
    public function salvar(Request $request){

        $request->validate([

            'nome' => 'required|min:5',
            'refeição' => 'required|min:5',
            'bebida' => 'required|min:5',
            'pagamento_id' => 'required'

        ],
        [
            'required' => 'Insira o(a) :attribute por favor',
            'min' => 'Os dados precisam ter no mínimo 10 caracteres'
        ]
    
    );
    
        $totalPedido = pedidos::create($request->all());
        
        return redirect()->route('pedido.total', ['pedido' => $totalPedido]);

    }

}