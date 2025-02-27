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
                <li class="breadcrumb-item active fw-medium small" aria-current="page">Editar</li>
            </ol>
        </nav>
    </div>

    <x-painel.alert></x-painel.alert>

    <div class="card mt-3">
        <div class="thin-bar">
        </div>
        <div class="card-body">
            <h5 class="card-title">Editar Categoria</h5>
        </div>

        <hr style="margin-top: -10px;" class="mb-4">
    
        <div class="mb-3 ms-3 me-3">
            <form action="{{ route('categoria-update', ['categoria' => $categoria->id]) }}" method="POST">
                @csrf()
                @method('PUT')
                <div class="row mb-3">
                    <input type="HIDDEN" class="form-control" id="id" name="id" value="{{ $categoria->id }}" required>
                    <!-- Título -->
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $categoria->nome }}" required>
                    </div>
                </div>

                <hr style="margin-top: -10px;" class="mb-4">
                <!-- Botão Submit -->
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-pen me-1"></i>Alterar
                </button>
            </form>
        </div>        
    </div>
</div>

@endsection