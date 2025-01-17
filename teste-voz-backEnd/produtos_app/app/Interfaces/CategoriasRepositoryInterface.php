<?php

namespace App\Interfaces;

use App\Http\Requests\ValidatorForm;
use App\Repository\Response\Response;
use Illuminate\Http\Request;

Interface CategoriasRepositoryInterface {

    public function Categories();
    public function create(Request $request, $id);
    public function update(Request $request, $id): Response;
    public function viewCategory(Request $request, $id): Response;
    public function delete($id): Response;

}