@extends('layouts.app-painel')

@section('content')

    <x-painel.alert></x-painel.alert>
    
    <h1>home</h1>

@endsection

@section('scripts')
    <script>
        $('.brand-item').click(function(event){
            event.preventDefault();
            var titulo = $(this).attr('data-titulo'); 
            var descricao = $(this).attr('data-descr'); 
            document.getElementById('convenioModalLabel').innerHTML = titulo;
            document.getElementById('convenioModalBody').innerHTML = descricao;
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection