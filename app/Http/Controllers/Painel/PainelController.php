<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerStoreRequest;
use App\Http\Requests\BannerUpdateRequest;
use App\Http\Requests\CategoriaStoreRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Regras\BannerRegras;
use App\Models\Regras\CategoriaRegras;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PainelController extends Controller
{
    public function index(Request $request)
    {
        $seo = seoTags();

        return view('painel.home', compact('seo'));
    }

    /**
     * Páginas
     */
    public function paginaGrid(Request $request)
    {
        $paginas = Banner::all();

        $seo = seoTags();

        return view('painel.paginas.paginas', compact('seo', 'paginas'));
    }

    /**
     * Blog
     */
    public function blogGrid(Request $request)
    {
        $banners = Banner::all();

        $seo = seoTags();

        return view('painel.blog.blog', compact('seo', 'banners'));
    }

    public function blogCreate()
    {
        $seo = seoTags();

        return view('painel.blog.blog-create', compact('seo'));
    }

    public function blogStore(BannerStoreRequest $request)
    {
        $data = $request->valid();
        $seo = seoTags();

        try{
            DB::beginTransaction();
            BannerRegras::cadastrarBanner($data, $request);
            DB::commit();

            return redirect()->route('blog-grid')->with('success', 'Cadastro realizado com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('blog-grid')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function blogEdit(int $id)
    {
        $seo = seoTags();

        $banner = Banner::find($id);

        return view('painel.blog.blog-edit', compact('seo', 'banner'));
    }

    public function blogUpdate(BannerUpdateRequest $request, Banner $banner)
    {
        $seo = seoTags();

        $data = $request->valid();

        try{
            DB::beginTransaction();
            BannerRegras::alterarBanner($data, $request, $banner);
            DB::commit();

            return redirect()->route('blog-grid')->with('success', 'Alteração realizada com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('blog-grid')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function blogDelete(int $id)
    {
        {
            if(!$blog = Blog::find($id)){
                return redirect()->route('blog-grid')->with('message', 'Banner não encontrado');
            }

            $blog->delete();

            return redirect()->route('blog-grid')->with('success', 'Banner deletado com sucesso');
        }
    }

    /**
     * Categorias
     */
   

    /**
     * Corpo Clínico
     */
    public function corpoClinicoGrid(Request $request)
    {
        $banners = Banner::all();

        $seo = seoTags();

        return view('painel.corpo-clinico', compact('seo', 'banners'));
    }

    public function especialidadeGrid(Request $request)
    {
        $banners = Banner::all();

        $seo = seoTags();

        return view('painel.especialidade', compact('seo', 'banners'));
    }

    public function convenioGrid(Request $request)
    {
        $banners = Banner::all();

        $seo = seoTags();

        return view('painel.convenio', compact('seo', 'banners'));
    }
}
