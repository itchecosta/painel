<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginaStoreRequest;
use App\Http\Requests\PaginaUpdateRequest;
use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Pagina;
use App\Models\Regras\PaginaRegras;
use App\Models\TipoPostagem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginaController extends Controller
{
    public function paginaGrid(Request $request)
    {
        $paginas = Pagina::all();

        $seo = seoTags();

        return view('painel.pagina.pagina', compact('seo', 'paginas'));
    }

    public function paginaCreate()
    {
        $seo = seoTags();

        $tipoPostagens = TipoPostagem::all();
        $categorias = Categoria::all();
        $autores = Autor::all();

        return view('painel.pagina.pagina-create', compact('seo', 'tipoPostagens', 'categorias', 'autores'));
    }

    public function paginaStore(PaginaStoreRequest $request)
    {
        // dd($request->all());

        $data = $request->valid();
        
        $seo = seoTags();

        try{
            DB::beginTransaction();
            PaginaRegras::cadastrarPagina($data, $request);
            DB::commit();

            return redirect()->route('pagina-grid')->with('success', 'Cadastro realizado com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('pagina-create')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function paginaEdit(int $id)
    {
        $seo = seoTags();

        $tipoPostagens = TipoPostagem::all();
        $categorias = Categoria::all();
        $autores = Autor::all();

        $pagina = Pagina::find($id);

        return view('painel.pagina.pagina-edit', compact('seo', 'pagina', 'tipoPostagens', 'categorias', 'autores'));
    }

    public function paginaUpdate(PaginaUpdateRequest $request, Pagina $pagina)
    {
        $seo = seoTags();

        $data = $request->valid();

        try{
            DB::beginTransaction();
            PaginaRegras::alterarPagina($data, $request, $pagina);
            DB::commit();

            return redirect()->route('pagina-grid')->with('success', 'Alteração realizada com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('pagina-edit')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function paginaDelete(int $id)
    {
        if(!$pagina = Pagina::find($id)){
            return redirect()->route('pagina-grid')->with('message', 'Página não encontrado');
        }

        $pagina->delete();

        return redirect()->route('pagina-grid')->with('success', 'Página deletada com sucesso');
    }
}
