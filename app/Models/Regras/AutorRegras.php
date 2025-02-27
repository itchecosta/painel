<?php

namespace App\Models\Regras;

use App\Models\Autor;
use Illuminate\Support\Facades\Storage;

class AutorRegras
{
    public static function cadastrarAutor($data, $request)
    {
        $autor = Autor::create($data);
        $autor->foto = $request->hasFile('foto') ? $request->file('foto')->store('imagens/autor', 'public') : null;
        $autor->save();

        return $autor;
    }

    public static function alterarAutor($data, $request, $autor)
    {
        $autor->update($data);
        if($request->hasFile('foto')) {
            if ($autor->foto && Storage::disk('public')->exists($autor->foto)) {
                Storage::disk('public')->delete($autor->foto);
            }

            $request->hasFile('foto') ? $autor->foto = $request->file('foto')->store('imagens/autor', 'public') : null;
        }
        $autor->save();

        return $autor;
    }
}
