<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Autor;
use App\Models\Blog;
use App\Models\Categoria;
use App\Models\Regras\BlogRegras;
use App\Models\TipoPostagem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function blogGrid(Request $request)
    {
        $blogs = Blog::all();

        $seo = seoTags();

        return view('painel.blog.blog', compact('seo', 'blogs'));
    }

    public function blogCreate()
    {
        $seo = seoTags();

        $tipoPostagens = TipoPostagem::all();
        $categorias = Categoria::all();
        $autores = Autor::all();

        return view('painel.blog.blog-create', compact('seo', 'tipoPostagens', 'categorias', 'autores'));
    }

    public function blogStore(BlogStoreRequest $request)
    {
        $data = $request->valid();
        
        $seo = seoTags();

        try{
            DB::beginTransaction();
            BlogRegras::cadastrarBlog($data, $request);
            DB::commit();

            return redirect()->route('blog-grid')->with('success', 'Cadastro realizado com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('blog-create')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function blogEdit(int $id)
    {
        $seo = seoTags();

        $tipoPostagens = TipoPostagem::all();
        $categorias = Categoria::all();
        $autores = Autor::all();

        $blog = Blog::find($id);

        return view('painel.blog.blog-edit', compact('seo', 'blog', 'tipoPostagens', 'categorias', 'autores'));
    }

    public function blogUpdate(BlogUpdateRequest $request, Blog $blog)
    {
        $seo = seoTags();

        $data = $request->valid();

        try{
            DB::beginTransaction();
            BlogRegras::alterarBlog($data, $request, $blog);
            DB::commit();

            return redirect()->route('blog-grid')->with('success', 'Alteração realizada com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('blog-edit')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function blogDelete(int $id)
    {
        if(!$blog = Blog::find($id)){
            return redirect()->route('blog-grid')->with('message', 'Postagem do Blog não encontrada');
        }

        $blog->delete();

        return redirect()->route('blog-grid')->with('success', 'Postagem do Blog deletada com sucesso');
    }
}
