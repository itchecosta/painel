<?php

namespace App\Models\Regras;

use App\Models\Pagina;
use Illuminate\Support\Facades\Storage;

class PaginaRegras
{
    public static function cadastrarPagina($data, $request)
    {
        $pagina = Pagina::create($data);
        $pagina->imagem = $request->file('imagem')->store('imagens/pagina', 'public');
        $pagina->save();

        return $pagina;
    }

    public static function alterarPagina($data, $request, $pagina)
    {
        $pagina->update($data);
        if($request->hasFile('imagem')) {
            if ($pagina->imagem && Storage::disk('public')->exists($pagina->imagem)) {
                Storage::disk('public')->delete($pagina->imagem);
            }

            $request->hasFile('imagem') ? $pagina->imagem = $request->file('imagem')->store('imagens/pagina', 'public') : null;
        }
        $pagina->save();

        return $pagina;
    }
}
