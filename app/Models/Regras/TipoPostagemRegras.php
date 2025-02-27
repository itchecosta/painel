<?php

namespace App\Models\Regras;

use App\Models\TipoPostagem;

class TipoPostagemRegras
{
    public static function cadastrarTipoPostagem($data)
    {
        $tipo = TipoPostagem::create($data);

        return $tipo;
    }

    public static function alterarTipoPostagem($data, $tipo)
    {
        $tipo->update($data);
        $tipo->fresh();

        return $tipo;
    }
}
