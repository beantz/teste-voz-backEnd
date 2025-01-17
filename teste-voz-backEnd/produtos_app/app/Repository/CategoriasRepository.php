<?php

namespace App\Repository;

use App\Interfaces\CategoriasRepositoryInterface;
use App\Models\Categorias;
use App\Repository\Response\Response;
use Illuminate\Http\Request;

class CategoriasRepository implements CategoriasRepositoryInterface {

    public function Categories() {
        
        $categorias = Categorias::all();

        if($categorias->isEmpty()) {

            //return response()->json(['msg' => 'ainda não possuimos produtos cadastrados']);
            return new Response(null, 'Ainda não possuimos dados cadastrados');

        } else {

          //return response()->json(['categorias' => $categorias]);
          return new Response($categorias, '');

        }

    }

    public function create(Request $request, $id) {

        //verificar se nome de categoria ja existe
        $nomeCategoria = Categorias::where('nome', $request->nome)->first();

        if($nomeCategoria){

            return new Response(null, "O nome ($request->nome) de categoria já está cadastrado! Digite novamente.");

        } else {

            $categoria = Categorias::create([
                        'nome' => $request->nome,
                        ]);
        
            return new Response($categoria, "Categoria cadastrada com sucesso");

        }

    }

    public function update(Request $request, $id): Response {

        $categoria = Categorias::find($id);

        $nomeCategoria = Categorias::where('nome', $request->nome)->first();

        if(isset($categoria)){

            if($nomeCategoria) {

                return new Response(null, "Já existe uma categoria com o nome de $request->nome, Digite novamente.");

            }
            
            $categoria->update($request->all());

            //mostrar as msg
            return  new Response($categoria, "Categoria atualizada");

        } else {

            return new Response(null, "Categoria de id: $id não encontrado");

        }

    }

    public function viewCategory(Request $request, $id): Response {
    
        $categoria = Categorias::find($id);

        if(isset($categoria)){

            return new Response($categoria, '');

        } else {
            return new Response(null, "Categoria de id: $id não encontrado");
        }

    }

    public function delete($id): Response {

        $categoria = Categorias::find($id);

        if($categoria) {

            $categoria->delete();

            //mostrar as msg
            return new Response(null, 'Categoria Deletado');

        } else {

            return new Response(null, "Categoria de id: $id não encontrado.");

        }

    }

}