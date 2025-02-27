@extends('layouts.app-painel')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h5 class="mb-0 me-6">
        GERENCIAR AUTOR
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
                <a href="#" class="text-decoration-none fw-medium small">Gerenciar Autor</a>
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
        <h5 class="card-title">Cadastrar Autor</h5>
    </div>

    <hr style="margin-top: -10px;" class="mb-4">

    <div class="mb-3 ms-3 me-3">
        <form action="{{ route('autor-store') }}" method="POST" enctype="multipart/form-data"  id="form-autor">
            @csrf()
            <div class="row mb-3">
                <!-- Título -->
                <div class="col-md-6">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}" required>
                </div>
                <!-- Subtítulo -->
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <!-- Foto -->
                <div class="col-md-6">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}" accept="image/*" required>
                    <small class="text-muted">Arquivo até 2 Mb</small>
                </div>
                <!-- Ativo -->
                {{-- <div class="col-md-3 mt-4">
                    <input type="hidden" name="ativo" value="0">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1" {{ old('ativo', $autor->ativo ?? 0) ? 'checked' : '' }}>
                        <label class="form-check-label" for="ativo">Ativo</label>
                    </div>
                </div> --}}
                <!-- Publicado -->
                <div class="col-md-3 mt-4">
                    <input type="hidden" name="publicado" value="0">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="publicado" name="publicado" value="1" {{ old('publicado', $autor->publicado ?? 0) ? 'checked' : '' }}>
                        <label class="form-check-label" for="publicado">Publicado</label>
                    </div>
                </div>
            </div>
            <!-- Perfil -->
            <div class="row mb-5">
                <div class="col-md-12">
                    <label for="perfil" class="form-label">Perfil</label>
                    <div id="toolbar-container">
                        <span class="ql-formats">
                            <select class="ql-font"></select>
                            <select class="ql-size"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                            <button class="ql-strike"></button>
                        </span>
                        <span class="ql-formats">
                            <select class="ql-color"></select>
                            <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-script" value="sub"></button>
                            <button class="ql-script" value="super"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-header" value="1"></button>
                            <button class="ql-header" value="2"></button>
                            <button class="ql-blockquote"></button>
                            <button class="ql-code-block"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-list" value="ordered"></button>
                            <button class="ql-list" value="bullet"></button>
                            <button class="ql-indent" value="-1"></button>
                            <button class="ql-indent" value="+1"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-direction" value="rtl"></button>
                            <select class="ql-align"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-link"></button>
                            <button class="ql-image"></button>
                            <button class="ql-video"></button>
                            <button class="ql-formula"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-clean"></button>
                        </span>
                    </div>
                    <div id="editor">
                    </div>
                    <textarea name="perfil" id="perfil" class="form-control" style="display: none;"></textarea>
                </div>
            </div>

            <hr style="margin-top: -10px;" class="mb-4">
            <!-- Botão Submit -->
            <button type="button" class="btn btn-primary" id="btn-submit">
                <i class="fas fa-plus me-2"></i>Cadastrar
            </button>
        </form>
    </div>        
</div>
     
<style>
    .thin-bar {
        height: 2px;
        background-color: #3c8dbc;
    }

    #editor {
        min-height: 150px; 
        border: 1px solid #ccc;
        padding: 5px;
        overflow-y: hidden; 
        background-color: #fff;
        margin-bottom: 5px; 
        resize: vertical; 
    }

    #btn-submit {
        margin-top: 20px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>

<script>
    const quill = new Quill('#editor', {
      modules: {
        syntax: true,
        toolbar: '#toolbar-container',
      },
      placeholder: 'Texto...',
      theme: 'snow',
    }); 

    // Injeta o valor do quill editor no campo determinado antes de submeter o formulário para que o campo não seja enviado com valor nulo
    document.querySelector('#btn-submit').addEventListener('click', function(event) {
        event.preventDefault(); 
        const perfil = document.querySelector('textarea[name="perfil"]');
        perfil.value = quill.root.innerHTML;

        const form = document.getElementById('form-autor');
        form.submit();
    });

    quill.on('text-change', function () {
        const editor = document.querySelector('#editor');
        editor.style.height = 'auto'; 
        editor.style.height = editor.scrollHeight + 'px'; 

        const btnSubmit = document.querySelector('#btn-submit');
        btnSubmit.style.marginTop = '20px'; 
    });
</script>

@endsection