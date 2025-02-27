<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutorStoreRequest;
use App\Http\Requests\AutorUpdateRequest;
use App\Models\Autor;
use App\Models\Regras\AutorRegras;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{
    public function autorGrid(Request $request)
    {
        $autores = Autor::all();

        $seo = seoTags();

        return view('painel.autor.autor', compact('seo', 'autores'));
    }

    public function autorCreate()
    {
        $seo = seoTags();

        return view('painel.autor.autor-create', compact('seo'));
    }

    public function autorStore(AutorStoreRequest $request)
    {
        // dd($request->all());

        $data = $request->valid();
        
        $seo = seoTags();

        try{
            DB::beginTransaction();
            AutorRegras::cadastrarAutor($data, $request);
            DB::commit();

            return redirect()->route('autor-grid')->with('success', 'Cadastro realizado com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('autor-create')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function autorEdit(int $id)
    {
        $seo = seoTags();

        $autor = Autor::find($id);

        return view('painel.autor.autor-edit', compact('seo', 'autor'));
    }

    public function autorUpdate(AutorUpdateRequest $request, Autor $autor)
    {
        $seo = seoTags();

        $data = $request->valid();

        try{
            DB::beginTransaction();
            AutorRegras::alterarAutor($data, $request, $autor);
            DB::commit();

            return redirect()->route('autor-grid')->with('success', 'Alteração realizada com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('autor-edit')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function autorDelete(int $id)
    {
        if(!$autor = Autor::find($id)){
            return redirect()->route('autor-grid')->with('message', 'Autor não encontrado');
        }

        $autor->delete();

        return redirect()->route('autor-grid')->with('success', 'Autor deletado com sucesso');
    }
}
