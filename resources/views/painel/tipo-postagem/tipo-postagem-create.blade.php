@extends('layouts.app-painel')

@section('content')
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0 me-6">
                GERENCIAR TIPOS DE POSTAGEM
                <span class="ms-5 lead fs-6">
                    Cadastrar
                </span>
            </h5>

            <nav aria-label="breadcrumb" class="mb-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none fw-medium small"><i class="fas fa-home me-2"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none fw-medium small">Gerenciar Tipos de Postagem</a>
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
                <h5 class="card-title">Cadastrar Tipos de Postagem</h5>
            </div>

            <hr style="margin-top: -10px;" class="mb-4">
        
            <div class="mb-3 ms-3 me-3">
                <form action="{{ route('tipo-store') }}" method="POST">
                    @csrf()
                    <div class="row mb-3">
                        <!-- Tipo Postagem -->
                        <div class="col-md-6">
                            <label for="tipo_postagem" class="form-label">Tipo de Postagem</label>
                            <input type="text" class="form-control" id="tipo_postagem" name="tipo_postagem" value="{{ old('tipo_postagem') }}" required>
                        </div>

                        <!-- Ativo -->
                        {{-- <div class="col-md-3 mt-4">
                            <input type="hidden" name="ativo" value="0">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1" {{ old('ativo', $tipo->ativo ?? 0) ? 'checked' : '' }}>
                                <label class="form-check-label" for="ativo">Ativo</label>
                            </div>
                        </div> --}}
                        <!-- publicado -->
                        <div class="col-md-3 mt-4">
                            <input type="hidden" name="publicado" value="0">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="publicado" name="publicado" value="1" {{ old('publicado', $tipo->publicado ?? 0) ? 'checked' : '' }}>
                                <label class="form-check-label" for="publicado">Publicado</label>
                            </div>
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

    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
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

    <style>
        #example thead th {
            background-color: #3c8dbc;
            color: white; 
        }
    </style>
@endsection