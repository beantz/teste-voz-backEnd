<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias extends Model
{
    protected $table = 'Categorias';
    
    use SoftDeletes;

    protected $fillable = ['nome'];
}
