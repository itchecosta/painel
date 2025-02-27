<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagina extends Model
{
    use HasFactory, Sluggable;

    use SoftDeletes;

    protected $guarded = [];

    public function getDataPublicacaoFormatadaAttribute()
    {
        return $this->data_publicacao 
            ? Carbon::parse($this->data_publicacao)->format('d/m/Y') 
            : null;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }

    public function tipoPostagem(): BelongsTo
    {
        return $this->belongsTo('App\Models\TipoPostagem', 'tipo_postagem_id', 'id');
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo('App\Models\Autor', 'autor_id', 'id');
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo('App\Models\Categoria', 'categoria_id', 'id');
    }
}
