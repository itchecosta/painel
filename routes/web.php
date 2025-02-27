<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Painel\AutorController;
use App\Http\Controllers\Painel\BannerController;
use App\Http\Controllers\Painel\BlogController;
use App\Http\Controllers\Painel\CategoriaController;
use App\Http\Controllers\Painel\PaginaController;
use App\Http\Controllers\Painel\PainelController;
use App\Http\Controllers\Painel\TipoController;
use App\Http\Controllers\Site\IndexController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login/store', 'login')->name('login.store');
    Route::get('/logout', 'logout')->name('logout')->middleware(['auth']);
});

// Route::middleware(['auth'])->group(function () {
    Route::get('/painel', [PainelController::class, 'index'])->name('painel');

    /**
     * Banner
     */
    Route::get('/painel/banner', [BannerController::class, 'bannerGrid'])->name('banner-grid');
    Route::get('/painel/banner/create', [BannerController::class, 'bannerCreate'])->name('banner-create');
    Route::post('/painel/banner/store', [BannerController::class, 'bannerStore'])->name('banner-store');
    Route::get('/painel/banner/{id}/edit', [BannerController::class, 'bannerEdit'])->name('banner-edit');
    Route::post('/painel/banner/{banner}/update', [BannerController::class, 'bannerUpdate'])->name('banner-update');
    Route::delete('/painel/banner/{id}/delete', [BannerController::class, 'bannerDelete'])->name('banner-delete');
    
    /**
     * Categorias
     */
    Route::get('/painel/categoria', [CategoriaController::class, 'categoriaGrid'])->name('categoria-grid');
    Route::get('/painel/categoria/create', [CategoriaController::class, 'categoriaCreate'])->name('categoria-create');
    Route::post('/painel/categoria/store', [CategoriaController::class, 'categoriaStore'])->name('categoria-store');
    Route::get('/painel/categoria/{id}/edit', [CategoriaController::class, 'categoriaEdit'])->name('categoria-edit');
    Route::put('/painel/categoria/{categoria}/update', [CategoriaController::class, 'categoriaUpdate'])->name('categoria-update');
    Route::delete('/painel/categoria/{id}/delete', [CategoriaController::class, 'categoriaDelete'])->name('categoria-delete');
    
    /**
     * Tipos de Postagem
     */
    Route::get('/painel/tipo-postagem', [TipoController::class, 'tipoGrid'])->name('tipo-grid');
    Route::get('/painel/tipo-postagem/create', [TipoController::class, 'tipoCreate'])->name('tipo-create');
    Route::post('/painel/tipo-postagem/store', [TipoController::class, 'tipoStore'])->name('tipo-store');
    Route::get('/painel/tipo-postagem/{id}/edit', [TipoController::class, 'tipoEdit'])->name('tipo-edit');
    Route::put('/painel/tipo-postagem/{tipo}/update', [TipoController::class, 'tipoUpdate'])->name('tipo-update');
    Route::delete('/painel/tipo-postagem/{id}/delete', [TipoController::class, 'tipoDelete'])->name('tipo-delete');
    
    /**
     * Autores
     */
    Route::get('/painel/autor', [AutorController::class, 'autorGrid'])->name('autor-grid');
    Route::get('/painel/autor/create', [AutorController::class, 'autorCreate'])->name('autor-create');
    Route::post('/painel/autor/store', [AutorController::class, 'autorStore'])->name('autor-store');
    Route::get('/painel/autor/{id}/edit', [AutorController::class, 'autorEdit'])->name('autor-edit');
    Route::post('/painel/autor/{autor}/update', [AutorController::class, 'autorUpdate'])->name('autor-update');
    Route::delete('/painel/autor/{id}/delete', [AutorController::class, 'autorDelete'])->name('autor-delete');
    
    /**
     * Paginas
     */
    Route::get('/painel/pagina', [PaginaController::class, 'paginaGrid'])->name('pagina-grid');
    Route::get('/painel/pagina/create', [PaginaController::class, 'paginaCreate'])->name('pagina-create');
    Route::post('/painel/pagina/store', [PaginaController::class, 'paginaStore'])->name('pagina-store');
    Route::get('/painel/pagina/{id}/edit', [PaginaController::class, 'paginaEdit'])->name('pagina-edit');
    Route::post('/painel/pagina/{pagina}/update', [PaginaController::class, 'paginaUpdate'])->name('pagina-update');
    Route::delete('/painel/pagina/{id}/delete', [PaginaController::class, 'paginaDelete'])->name('pagina-delete');
    
    /**
     * Blog
     */
    Route::get('/painel/blog', [BlogController::class, 'blogGrid'])->name('blog-grid');
    Route::get('/painel/blog/create', [BlogController::class, 'blogCreate'])->name('blog-create');
    Route::post('/painel/blog/store', [BlogController::class, 'blogStore'])->name('blog-store');
    Route::get('/painel/blog/{id}/edit', [BlogController::class, 'blogEdit'])->name('blog-edit');
    Route::post('/painel/blog/{blog}/update', [BlogController::class, 'blogUpdate'])->name('blog-update');
    Route::delete('/painel/blog/{id}/delete', [BlogController::class, 'blogDelete'])->name('blog-delete');

// });

