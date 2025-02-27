<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuracao extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['variavel','valor','created_at','updated_at','deleted_at'];
    protected $table = 'configuracao';

}
