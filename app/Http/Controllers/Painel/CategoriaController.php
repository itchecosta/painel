<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaStoreRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Models\Categoria;
use App\Models\Regras\CategoriaRegras;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function categoriaGrid(Request $request)
    {
        $categorias = Categoria::all();

        $seo = seoTags();

        return view('painel.categorias.categoria', compact('seo', 'categorias'));
    }

    public function categoriaCreate(Request $request)
    {
        $seo = seoTags();

        return view('painel.categorias.categoria-create', compact('seo'));
    }

    public function categoriaStore(CategoriaStoreRequest $request)
    {
        $data = $request->valid();
        $seo = seoTags();

        try{
            DB::beginTransaction();
            CategoriaRegras::cadastrarCategoria($data);
            DB::commit();

            return redirect()->route('categoria-grid')->with('success', 'Cadastro realizado com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('categoria-grid')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function categoriaEdit(int $id)
    {
        $seo = seoTags();

        $categoria = Categoria::find($id);

        return view('painel.categorias.categoria-edit', compact('seo', 'categoria'));
    }

    public function categoriaUpdate(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        $seo = seoTags();

        $data = $request->valid();

        try{
            DB::beginTransaction();
            CategoriaRegras::alterarCategoria($data, $categoria);
            DB::commit();

            return redirect()->route('categoria-grid')->with('success', 'Alteração realizada com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('categoria-grid')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function categoriaDelete(int $id)
    {
        {
            if(!$categoria = Categoria::find($id)){
                return redirect()->route('categoria-grid')->with('message', 'Categoria não encontrada');
            }

            $categoria->delete();

            return redirect()->route('categoria-grid')->with('success', 'Categoria deletada com sucesso');
        }
    }
}
