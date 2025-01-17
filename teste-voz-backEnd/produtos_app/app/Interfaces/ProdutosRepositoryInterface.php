<?php

namespace App\Interfaces;

use App\Http\Requests\ValidatorForm;
use App\Models\Produtos;
use App\Repository\Response\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

interface ProdutosRepositoryInterface {

    public function Products();
    public function create(Request $request): Response;
    public function update(Request $request, $id): Response;
    public function delete($id): Response;
    public function viewProduct(Request $request, $id): Response;

}