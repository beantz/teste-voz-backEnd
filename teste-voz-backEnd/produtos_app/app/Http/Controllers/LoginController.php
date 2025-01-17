<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\User;
use App\Repository\CategoriasRepository;
use App\Repository\ProdutosRepository;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    //ver esse retorno que não está funcionando
    public function index(Request $request) {
        
        return view('site.login', ['msg' => $request->msg]);

    }

    public function auth(Request $request) {

        if($request->method() == 'GET'){
            
            $result = new categoriasRepository();

            $categorias = $result->Categories();

            $resultProduts = new ProdutosRepository();

            $produtos = $resultProduts->Products();

            $msg = $request->query('msg');

            return view('adm.index', ['categorias' => $categorias, 'produtos' => $produtos, 'msg' => $msg]);

        } else {

            $email = $request->get('email');
            $password = $request->get('password');

            $usuario = User::where('email', $email)->where('password', $password)->get()->first();

            if(isset($usuario)){

                session_start();

                $_SESSION['name'] = $usuario->name;
                $_SESSION['email'] = $usuario->email;


                return redirect()->route('adm.index', ['msg' => 'Seja bem vindo adm!']);

                //return view('adm.index',);

            } else {

                return 'Voce não está autenticado para acessar essa rota';

            }

            }

    }

    public function destroy(){

        session_start();

        session_destroy();

        return view('site.login', ['msg' => 'Você foi deslogado.']);

    }

}
