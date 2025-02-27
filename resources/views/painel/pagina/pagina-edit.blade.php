@extends('layouts.app-painel')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0 me-6">
            GERENCIAR PÁGINAS
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
                    <a href="#" class="text-decoration-none fw-medium small">Gerenciar Página</a>
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
            <h5 class="card-title">Editar página</h5>
        </div>

        <hr style="margin-top: -10px;" class="mb-4">
    
        <div class="mb-3 ms-3 me-3">
            <form action="{{ route('pagina-update', ['pagina' => $pagina->id]) }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf()
                <div class="row mb-3">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $pagina->id }}">
                    <!-- Título -->
                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $pagina->titulo }}" required>
                    </div>
                    <!-- foto -->
                    <div class="col-md-4">
                        <label for="imagem" class="form-label">Imagem</label>
                        <input type="file" class="form-control" id="imagem" name="imagem" value="{{ old('imagem') }}" accept="image/*">
                        <small class="text-muted">Limite de 2 Mb</small>
                    </div>
                    <div class="col-md-2">
                        <img src="{{ asset('storage/' . $pagina->imagem) }}" alt="Imagem" style="width: 150px; height: 80px;">
                    </div>
                </div>
                <div class="row mb-3">
                     <!-- Tipo de Postagem -->
                    <div class="col-md-6">
                        <label for="tipo_postagem_id" class="form-label">tipo de Postagem</label>
                        <select class="form-select select2" name="tipo_postagem_id" id="tipo_postagem_id" required>
                            <option selected>Selecione...</option>
                            @foreach ($tipoPostagens as $tipoPostagem)
                                <option value="{{ $tipoPostagem->id }}" {{ $tipoPostagem->id == $pagina->tipo_postagem_id ? 'selected' : '' }}>{{ $tipoPostagem->tipo_postagem }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Categoria -->
                    <div class="col-md-6">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select class="form-select select2" name="categoria_id" id="categoria_id" required>
                            <option selected>Selecione...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $categoria->id == $pagina->categoria_id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- Autor -->
                    <div class="col-md-6">
                        <label for="autor_id" class="form-label">autor</label>
                        <select class="form-select select2" name="autor_id" id="autor_id" required>
                            <option selected>Selecione...</option>
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}" {{ $autor->id == $pagina->autor_id ? 'selected' : '' }}>{{ $autor->autor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Data Início -->
                    <div class="col-md-6">
                        <label for="data_publicacao" class="form-label">Data de Publicação</label>
                        <input type="date" class="form-control" id="data_publicacao" name="data_publicacao" value="{{ $pagina->data_publicacao }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- Fonte -->
                    <div class="col-md-6">
                        <label for="fonte" class="form-label">Fonte</label>
                        <input type="text" class="form-control" id="fonte" name="fonte" value="{{ $pagina->fonte }}" required>
                    </div>
                    <!-- Ativo -->
                    {{-- <div class="col-md-3 mt-4">
                        <input type="hidden" name="ativo" value="0">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1" {{ old('ativo', $pagina->ativo ?? 0) ? 'checked' : '' }}>
                            <label class="form-check-label" for="ativo">Ativo</label>
                        </div>
                    </div> --}}
                    <!-- publicado -->
                    <div class="col-md-3 mt-4">
                        <input type="hidden" name="publicado" value="0">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="publicado" name="publicado" value="1" {{ old('publicado', $pagina->publicado ?? 0) ? 'checked' : '' }}>
                            <label class="form-check-label" for="publicado">Publicado</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-12">
                        <label for="texto" class="form-label">Texto</label>
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
                        <textarea name="texto" id="texto" class="form-control" style="display: none;"></textarea>
                    </div>
                </div>

                <hr style="margin-top: -10px;" class="mb-4">
                <!-- Botão Submit -->
                <button type="button" class="btn btn-primary" id="btn-submit">
                    <i class="fas fa-pen me-1"></i>Alterar
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

        @if(isset($pagina->texto))
            console.log({!! json_encode($pagina->texto) !!});
            quill.root.innerHTML = {!! json_encode($pagina->texto) !!};
        @endif

        // Injeta o valor do quill editor no campo determinado antes de submeter o formulário para que o campo não seja enviado com valor nulo
        document.querySelector('#btn-submit').addEventListener('click', function(event) {
            event.preventDefault(); 
            const texto = document.querySelector('textarea[name="texto"]');
            texto.value = quill.root.innerHTML;

            const form = document.getElementById('form');
            form.submit();
        });

        quill.on('text-change', function () {
            const editor = document.querySelector('#editor');
            editor.style.height = 'auto'; 
            editor.style.height = editor.scrollHeight + 'px'; 

            const btnSubmit = document.querySelector('#btn-submit');
            btnSubmit.style.marginTop = '20px'; 
        });

        $(function() {
            $('.select2').select2({
                theme:'bootstrap-5'
            });
        })
    </script>

@endsection