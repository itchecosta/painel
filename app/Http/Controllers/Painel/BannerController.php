<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerStoreRequest;
use App\Http\Requests\BannerUpdateRequest;
use App\Models\Banner;
use App\Models\Regras\BannerRegras;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function bannerGrid(Request $request)
    {
        $banners = Banner::all();

        $seo = seoTags();

        return view('painel.banner.banner', compact('seo', 'banners'));
    }

    public function bannerCreate()
    {
        $seo = seoTags();

        return view('painel.banner.banner-create', compact('seo'));
    }

    public function bannerStore(BannerStoreRequest $request)
    {
        $data = $request->valid();
        
        $seo = seoTags();

        try{
            DB::beginTransaction();
            BannerRegras::cadastrarBanner($data, $request);
            DB::commit();

            return redirect()->route('banner-grid')->with('success', 'Cadastro realizado com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('banner-grid')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function bannerEdit(int $id)
    {
        $seo = seoTags();

        $banner = Banner::find($id);

        return view('painel.banner.banner-edit', compact('seo', 'banner'));
    }

    public function bannerUpdate(BannerUpdateRequest $request, Banner $banner)
    {
        $seo = seoTags();

        $data = $request->valid();

        try{
            DB::beginTransaction();
            BannerRegras::alterarBanner($data, $request, $banner);
            DB::commit();

            return redirect()->route('banner-grid')->with('success', 'Alteração realizada com sucesso');

        } catch(Exception $e) {
            DB::rollBack();

            return redirect()->route('banner-grid')->with('error', 'Ocorreu um erro. Tente novamente');
        }
    }

    public function bannerDelete(int $id)
    {
        {
            if(!$banner = Banner::find($id)){
                return redirect()->route('banner-grid')->with('message', 'Banner não encontrado');
            }

            $banner->delete();

            return redirect()->route('banner-grid')->with('success', 'Banner deletado com sucesso');
        }
    }
}
