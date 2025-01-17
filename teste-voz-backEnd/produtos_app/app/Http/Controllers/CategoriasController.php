<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoriasRepositoryInterface;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    private CategoriasRepositoryInterface $categoriesRepository;

    public function __construct(CategoriasRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function Categories(Request $request){

        $response = $this->categoriesRepository->Categories();  

        $categorias = $response->data;

        if(!is_null($categorias)){

            $msg = $request->query('msg');

            $dataQuantity = count($categorias);

            return view('site.categorias-todas', ['categorias' => $categorias, 'msg' => $msg, 'dataQuantity' => $dataQuantity]);
            
        } else {

            return $response->msg;

        }

    }

    public function create(Request $request, $id = null) {

        $categoria = $this->categoriesRepository->viewCategory($request, $id);

        //só fazer o cadastramento
        if($request->getMethod() == 'POST' && is_null($id)) {

            $categorias = $this->categoriesRepository->create($request, $id);

            //se ja existir uma categoria com o mesmo nome
            if(is_null($categorias->data)) {

                return view('adm.categorias-cadastrar', ['msg' => $categorias->msg, 'categoria' => $categorias->data, 'rota' => 'cadastrar.categorias']);

            } else {

                //retornar categoria cadastrada na view comportilhada com produtos, retorna apenas os dados da mesma
                return view('site.produto', ['categoria' => $categorias->data, 'tipo' => 'categoria']);

            }

        //só retornar a view de cadastrar
        } elseif ($request->getMethod() != 'POST' && is_null($id)) {

            return view('adm.categorias-cadastrar', ['id' => $id, 'categoria' => $categoria->data, 'rota' => 'cadastrar.categorias']);

        //retornar view pra editar categoria
        } elseif($request->getMethod() == 'GET' && !is_null($id)) {

            return view('adm.categorias-cadastrar', ['rota' => 'atualizar.categorias', 'categoria' => $categoria->data, 'id' => $id]);

        } 

    }

    public function update(Request $request, $id) {

        $categorias = $this->categoriesRepository->update($request, $id);

        if(is_null($categorias->data) && !empty($categorias->msg)) {

            $categoria = $this->categoriesRepository->viewCategory($request, $id);

            //msg de dado nao encontrado
            return view('adm.categorias-cadastrar', ['id' => $id, 'msg' => $categorias->msg, 'rota' => 'atualizar.categorias', 'categoria' => $categoria->data]);

        //dado e msg
        } else {

            return  redirect()->route('adm.index', ['msg' => $categorias->msg]);

        }

    }

    public function viewCategory(Request $request, $id) {

        $categoria = $this->categoriesRepository->viewCategory($request, $id);

        if(!is_null($categoria->data)) {

            return view('site.produto', ['categoria' => $categoria->data, 'tipo' => 'categoria']);

        } else {

            return redirect()->route('visualizar.categorias', ['msg' => $categoria->msg]);

        }

    }

    public function delete($id) {

        $categorias = $this->categoriesRepository->delete($id);

        $msg = $categorias->msg;

        return redirect()->route('adm.index', ['msg' => $msg]);

    }

}
