@extends('layouts.app-painel')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0 me-6">
            GERENCIAR CATEGORIAS
            <a class="btn btn-primary btn-sm ms-6" style="padding: 2px 8px; font-size: 12px;" type="button" href="{{  route('categoria-create') }}">
                <i class="fas fa-plus me-2"></i>Adicionar Novo
            </a>
        </h5>

        <nav aria-label="breadcrumb" class="mb-0">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none fw-medium small"><i class="fas fa-home me-2"></i>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none fw-medium small">Gerenciar Categorias</a>
                </li>
                <li class="breadcrumb-item active fw-medium small" aria-current="page">Cadastrar</li>
            </ol>
        </nav>
    </div>

    <x-painel.alert></x-painel.alert>

    <div class="card mt-3">
        <div class="thin-bar">
        </div>
        <div class="card-body">
            <h5 class="card-title">Cadastrar Categoria</h5>
        </div>

        <hr style="margin-top: -10px;" class="mb-4">
    
        <div class="mb-3 ms-3 me-3">
            <form action="{{ route('categoria-store') }}" method="POST">
                @csrf()
                <div class="row mb-3">
                    <!-- Título -->
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
                    </div>
                </div>

                <hr style="margin-top: -10px;" class="mb-4">
                <!-- Botão Submit -->
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Cadastrar
                </button>
            </form>
        </div>        
    </div>
</div>

    <!-- Certifique-se de incluir os links do DataTables -->
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet">

    <!-- jQuery (necessário para o DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- JavaScript do DataTables -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        new DataTable('#example', {
            autoWidth: true,
            responsive: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.5/i18n/pt-BR.json"
            }
        });
    </script>

    <!-- Custom CSS -->
    <style>
        /* Altera a cor de fundo do cabeçalho da tabela */
        #example thead th {
            background-color: #3c8dbc;
            color: white; /* Torna o texto branco para contraste */
        }
    </style>
@endsection