@extends('site.layouts.basico')

@section('conteudo')
    @component('site._components.todos-dados', ['baseDados' => $produtos, 'dado' => 'produtos', 'msg' => $msg, 'dataQuantity' => $dataQuantity])
    @endcomponent
@endsection