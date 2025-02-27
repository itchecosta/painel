<?php

namespace App\Models\Regras;

use App\Models\Categoria;

class CategoriaRegras
{
    public static function cadastrarCategoria($data)
    {
        $categoria = Categoria::create($data);

        return $categoria;
    }

    public static function alterarCategoria($data, $categoria)
    {
        $categoria->update($data);
        $categoria->fresh();

        return $categoria;
    }
}
