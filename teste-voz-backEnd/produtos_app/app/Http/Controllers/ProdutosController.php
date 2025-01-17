<?php

namespace App\Http\Controllers;

use App\Interfaces\ProdutosRepositoryInterface;
use App\Interfaces\CategoriasRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatorForm;

class ProdutosController extends Controller
{

    private CategoriasRepositoryInterface $categoriasRepository;
    private ProdutosRepositoryInterface $produtosRepository;

    public function __construct(ProdutosRepositoryInterface $produtosRepository, CategoriasRepositoryInterface $categoriasRepository)
    {
        $this->produtosRepository = $produtosRepository;
        $this->categoriasRepository = $categoriasRepository;

    }

    public function Products(Request $request) {

        $response = $this->produtosRepository->Products();

        /*retornando pra view os produtos e msg se tiver*/
        if(!is_null($response->data)) {

            $dataQuantity = count($response->data);

            $msg = $request->query('msg');
            
            return view('site.produtos-todos', ['produtos' => $response->data, 'msg' => $msg, 'dataQuantity' => $dataQuantity]);

        } else {

            return $response->msg;

        }
    }

    public function create(ValidatorForm $request, $id = null) {

        $categorias = $this->categoriasRepository->Categories();

        //fazer de fato o cadastramento
        if($request->getMethod() == 'POST' && is_null($id)){

            //validações
            $request->validated();

            $response = $this->produtosRepository->create($request);
        
            $produto = $response->data;

            //apos produto cadastrado vai retornar ele individualmente
            return redirect()->route('visualizar.produto', ['tipo' => 'produto', 'id' => $produto->id]); 

        //apenas retornar view cadastrar
        } elseif($request->getMethod() != 'POST' && is_null($id)) {

            $msg = '';

            return view('adm.produto-cadastrar', ['categorias' => $categorias, 'msg' => $msg, 'rota' => 'cadastrar.produto']);
        
        //retornar view para editar
        } elseif($request->getMethod() == 'POST' && !is_null($id)){

            $produto = $this->produtosRepository->viewProduct($request, $id);
            
            return view('adm.produto-cadastrar', ['produto' => $produto->data, 'rota' => 'atualizar.produto', 'id' => $id, 'categorias' => $categorias]);

        }

    }

    public function update(Request $request, $id) {

        $categorias = $this->categoriasRepository->Categories();

        $response = $this->produtosRepository->update($request, $id);

        //return vizualizao de um dado
        if($response->data !=  null && $response->msg != ''){
            
            return view('site.produto', ['tipo' => 'produto', 'produto' => $response->data, 'msg' => $response->msg]);
            
        } else {
            return view('adm.produto-cadastrar', ['msg' => $response->msg, 'id' => $id, 'rota' => 'atualizar.produto', 
                'categorias' => $categorias, 'produto' => null]);

        }
        
    }

    public function delete($id) {

        $response = $this->produtosRepository->delete($id);

        $msg = $response->msg;

        return redirect()->route('adm.index', ['msg' => $msg]);

    }

    public function viewProduct(Request $request, $id) {

        $response = $this->produtosRepository->viewProduct($request, $id);
        
        if($response->data != null){

            return view('site.produto', ['produto' => $response->data, 'tipo' => 'produto']);

        } else {

            return redirect()->route('visualizar.produtos', ['msg' => $response->msg]);

        }

    }

}


