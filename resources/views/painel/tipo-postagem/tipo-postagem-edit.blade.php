@extends('layouts.app-painel')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0 me-6">
            GERENCIAR TIPOS DE POSTAGEM
            <span class="ms-5 lead fs-6">
                Editar
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
                <li class="breadcrumb-item active fw-medium small" aria-current="page">Editar</li>
            </ol>
        </nav>
    </div>

    <x-painel.alert></x-painel.alert>

    <div class="card mt-3">
        <div class="thin-bar">
        </div>
        <div class="card-body">
            <h5 class="card-title">Editar Tipo de Postagem</h5>
        </div>

        <hr style="margin-top: -10px;" class="mb-4">
    
        <div class="mb-3 ms-3 me-3">
            <form action="{{ route('tipo-update', ['tipo' => $tipo->id]) }}" method="POST">
                @csrf()
                @method('PUT')
                <div class="row mb-3">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $tipo->id }}" required>
                    <!-- Título -->
                    <div class="col-md-6">
                        <label for="tipo_postagem" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="tipo_postagem" name="tipo_postagem" value="{{ $tipo->tipo_postagem }}" required>
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
                    <i class="fas fa-pen me-1"></i>Alterar
                </button>
            </form>
        </div>        
    </div>
</div>

@endsection