<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refeiçõesSaudaveis extends Model
{
    //
    use HasFactory;
    protected $table = 'refeições saudaveis';
    
    protected $fillable = ['nome', 'preço'];
}
