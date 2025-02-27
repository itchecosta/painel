<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipoPostagemStoreRequest;
use App\Http\Requests\TipoPostagemUpdateRequest;
use App\Models\Regras\TipoPostagemRegras;
use App\Models\TipoPostagem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoController extends Controller
{
    public function tipoGrid(Request $request)
    {
        $tipoPostagems = TipoPostagem::all();

        $seo = seoTags();

        return view('painel.tipo-postagem.tipo-postagem', compact('seo', 'tipoPostagems'));
    }

    public function tipoCreate(Request $request)
    {
        $seo = seoTags();

        return view('painel.tipo-postagem.tipo-postagem-create', compact('seo'));
    }

    public function tipoStore(TipoPostagemStoreRequest $request)
    {
        $data = $request->valid();
        $seo = seoTags();

        try{
            DB::beginTransaction();
            TipoPostagemRegras::cadastrarTipoPostagem($data);
            DB::commit();

            return redirect()->route('tipo-grid')->with('success', 'Cadastro realizado com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('tipo-grid')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function tipoEdit(int $id)
    {
        $seo = seoTags();

        $tipo = TipoPostagem::find($id);

        return view('painel.tipo-postagem.tipo-postagem-edit', compact('seo', 'tipo'));
    }

    public function tipoUpdate(TipoPostagemUpdateRequest $request, TipoPostagem $tipo)
    {
        $seo = seoTags();

        $data = $request->valid();

        try{
            DB::beginTransaction();
            TipoPostagemRegras::alterarTipoPostagem($data, $tipo);
            DB::commit();

            return redirect()->route('tipo-grid')->with('success', 'Alteração realizada com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('tipo-grid')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function tipoDelete(int $id)
    {
        {
            if(!$tipo = TipoPostagem::find($id)){
                return redirect()->route('categoria-grid')->with('message', 'Tipo de Postagem não encontrada');
            }

            $tipo->delete();

            return redirect()->route('tipo-grid')->with('success', 'Tipo de Postagem deletada com sucesso');
        }
    }
}
