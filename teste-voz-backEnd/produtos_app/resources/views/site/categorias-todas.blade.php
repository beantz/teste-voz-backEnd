@extends('site.layouts.basico')

@section('conteudo')
    @component('site._components.todos-dados', ['baseDados' => $categorias, 'dado' => 'categorias', 'msg' => $msg, 'dataQuantity' => $dataQuantity])
    @endcomponent
@endsection