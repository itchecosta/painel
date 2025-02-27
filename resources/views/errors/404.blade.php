@extends('layouts.app')

@section('content')

<div class="spacer"></div>
<section class="404 mb-3">
    <div class="container text-center">
        <h1>404 - Página não encontrada</h1>
        <p>Desculpe, mas a página que você está procurando não existe ou foi movida.</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('/') }}" class="btn-theme">
                Voltar à página inicial
            </a>
          </div>
    </div>
</section>
@endsection
