<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instituicao extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['titulo','texto','imagem','video','missao','visao','valores','created_at','updated_at','deleted_at'];
    protected $table = 'instituicao';
}
