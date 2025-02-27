@extends('layouts.app-painel')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0 me-6">
            GERENCIAR BANNER
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
                    <a href="#" class="text-decoration-none fw-medium small">Gerenciar Banner</a>
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
            <h5 class="card-title">Editar Banner</h5>
        </div>

        <hr style="margin-top: -10px;" class="mb-4">
    
        <div class="mb-3 ms-3 me-3">
            <form action="{{ route('banner-update' , ['banner' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf()
                <div class="row mb-3">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $banner->id }}">
                    <!-- Título -->
                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $banner->titulo }}" required>
                    </div>
                    <!-- Subtítulo -->
                    <div class="col-md-6">
                        <label for="subtitulo" class="form-label">Subtítulo</label>
                        <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="{{ $banner->subtitulo }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- Link -->
                    <div class="col-md-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" id="link" name="link" value="{{ $banner->link }}" required>
                    </div>
                    <!-- Link name -->
                    <div class="col-md-3">
                        <label for="link" class="form-label">Link Name</label>
                        <input type="text" class="form-control" id="link_name" name="link_name" value="{{ $banner->link_name }}" required>
                    </div>
                    <!-- Imagem -->
                    <div class="col-md-4">
                        <label for="imagem" class="form-label">Imagem</label>
                        <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
                        <small class="text-muted">JPG e PNG.</small>
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('storage/' . $banner->imagem) }}" alt="Imagem" style="width: 150px; height: 80px;">
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- Tipo -->
                    <div class="col-md-6">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $banner->tipo }}" required>
                    </div>
                    <!-- Ordem -->
                    <div class="col-md-6">
                        <label for="order" class="form-label">Ordem</label>
                        <input type="number" class="form-control" id="order" name="order" min="0" value="{{ $banner->order }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- Data Início -->
                    <div class="col-md-3">
                        <label for="data_inicio" class="form-label">Data Início</label>
                        <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="{{ $banner->data_inicio }}" required>
                    </div>
                    <!-- Hora Início -->
                    <div class="col-md-3">
                        <label for="hora_inicio" class="form-label">Hora Início</label>
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ \Carbon\Carbon::parse($banner->hora_inicio)->format('H:i') }}" required>
                    </div>
                    <!-- Data Término -->
                    <div class="col-md-3">
                        <label for="data_termino" class="form-label">Data Término</label>
                        <input type="date" class="form-control" id="data_termino" name="data_termino" value="{{ $banner->data_termino }}" required>
                    </div>
                    <!-- Hora Término -->
                    <div class="col-md-3">
                        <label for="hora_termino" class="form-label">Hora Término</label>
                        <input type="time" class="form-control" id="hora_termino" name="hora_termino" value="{{ \Carbon\Carbon::parse($banner->hora_termino)->format('H:i') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="hidden" name="publicado" value="0">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="publicado" name="publicado" value="1" {{ old('publicado', $banner->publicado ?? 0) ? 'checked' : '' }}>
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
     
    <style>
        .thin-bar {
            height: 2px;
            background-color: #3c8dbc; /* Substitua pela cor desejada */
        }
    </style>

@endsection