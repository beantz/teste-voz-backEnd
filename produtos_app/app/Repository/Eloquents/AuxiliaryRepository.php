<?php

namespace App\Repository\Eloquents;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

    class AuxiliaryRepository {

        //metodo pra verificar se existe um outro produto com o mesmo nome 
        public function verifyProdutosUp(Request $r){

            $name = $r->name;
            $id = $r->id;
            //consultando no banco
            $produto = DB::select('SELECT * FROM produtos WHERE name = ? && id != ?', [$name, $id]);

            if (count($produto) > 0) {
                return true; 
            } else {
                return false; 
            }

        }

        public function verifyProdutosCr(Request $r){

            $name = $r->name;
            $id = $r->id;
            //consultando no banco
            $produto = DB::select('SELECT * FROM produtos WHERE name = ?', [$name]);

            if (count($produto) > 0) {
                return true; // O produto já existe
            } else {
                return false; // O produto não existe
            }

        }

    }
