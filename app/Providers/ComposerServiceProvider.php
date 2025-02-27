<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\Configuracao;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('components.footer', function($view){
            $configuracoes = Configuracao::get();
            foreach($configuracoes as $config){
                $conf[$config->variavel] = $config->valor;
            }
            if(isset($conf)){
                return $view->with('config', $conf);
            }
        });

        

        view()->composer('components.header', function($view){
            $configuracoes = Configuracao::get();
            foreach($configuracoes as $config){
                $conf[$config->variavel] = $config->valor;
            }
            if(isset($conf)){
                return $view->with('config', $conf);
            }
        });

        // view()->composer('components.site.seo', function($view){
        //     $seoKey = url();

        //         return $view->with('seo', $seoKey);
        // });
    }


    public function register()
    {
        //
    }

}
