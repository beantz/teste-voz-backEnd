<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedidoTotal extends Model
{
    //
    protected $table = 'total pedido';
    
    protected $fillable = ['nome', 'refeição_id', 'refeição_saudaveis_id', 'bebida_id', 'total'];
}
