<?php

namespace App\Models\Regras;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerRegras
{
    public static function cadastrarBanner($data, $request)
    {
        $banner = Banner::create($data);
        $banner->imagem = $request->file('imagem')->store('imagens/banner', 'public');
        $banner->save();

        return $banner;
    }

    public static function alterarBanner($data, $request, $banner)
    {
        $banner->update($data);
        if($request->hasFile('imagem')) {
            if ($banner->imagem && Storage::disk('public')->exists($banner->imagem)) {
                Storage::disk('public')->delete($banner->imagem);
            }

            $request->hasFile('imagem') ? $banner->imagem = $request->file('imagem')->store('imagens/banner', 'public') : null;
        }
        $banner->save();

        return $banner;
    }
}
