<?php

namespace App\Models\Regras;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogRegras 
{
    public static function cadastrarBlog($data, $request)
    {
        $blog = Blog::create($data);
        $blog->imagem = $request->file('imagem')->store('imagens/blog', 'public');
        $blog->save();

        return $blog;
    }

    public static function alterarblog($data, $request, $blog)
    {
        $blog->update($data);
        if($request->hasFile('imagem')) {
            if ($blog->imagem && Storage::disk('public')->exists($blog->imagem)) {
                Storage::disk('public')->delete($blog->imagem);
            }

            $request->hasFile('imagem') ? $blog->imagem = $request->file('imagem')->store('imagens/blog', 'public') : null;
        }
        $blog->save();

        return $blog;
    } 
}
