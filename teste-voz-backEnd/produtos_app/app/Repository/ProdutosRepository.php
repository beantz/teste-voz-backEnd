<?php

namespace App\Repository;

use App\Interfaces\ProdutosRepositoryInterface;
use App\Repository\Response\Response;
use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosRepository implements ProdutosRepositoryInterface {

    public function Products(): Response {
        
        $produtos = Produtos::all();

        if($produtos == ''){

            return new Response(null, 'Ainda não possuimos produtos cadastrados!');

        } else {

            return new Response($produtos, '');

        }

    }
    
    public function create(Request $request): Response {

        $produto = Produtos::create($request->all());

        return new Response($produto, 'Produto cadastrado com sucesso');

    }

    public function update(Request $request, $id): Response {

        $produto = Produtos::find($id);

        if(isset($produto)){
            
            $produto = Produtos::find($id);
            $produto->fill($request->all());
            $produto->save();

            return  new Response($produto, "Produto atualizado");

        } else {

            return new Response(null, "Produto de id: $id não encontrado");

        }

    }

    public function delete($id): Response {

        $produto = Produtos::find($id);

        if($produto) {

            $produto->delete();

            //mostrar as msg
            return new Response(null, 'Produto Deletado');

        } else {

            return  new Response(null, "Produto de $id não encontrado");

        }

    }

    public function viewProduct(Request $request, $id): Response {
        
        $produto = Produtos::find($id);

        if(isset($produto)){
            return new Response($produto, '');

        } else {
            return new Response(null, "Produto de id: $id não encontrado");
        }

    }

}