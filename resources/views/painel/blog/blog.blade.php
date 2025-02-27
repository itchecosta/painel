@extends('layouts.app-painel')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0 me-6">
            GERENCIAR BLOG
            <a class="btn btn-primary btn-sm ms-6" style="padding: 2px 8px; font-size: 12px;" type="button" href="{{ route('blog-create') }}">
                <i class="fas fa-plus me-2"></i>Adicionar Novo
            </a>
        </h5>

        <nav aria-label="breadcrumb" class="mb-0">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none fw-medium small"><i class="fas fa-home me-2"></i>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none fw-medium small">Gerenciar Blog</a>
                </li>
                <li class="breadcrumb-item active fw-medium small" aria-current="page">Consultar</li>
            </ol>
        </nav>
    </div>

    <x-painel.alert></x-painel.alert>

    <div class="mt-4">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 20%;">IMAGEM</th>
                    <th style="width: 30%;">TÍTULO</th>
                    <th style="width: 5%;">CADASTRO</th>
                    <th style="width: 20%;">DATA DE PUBLICAÇÃO</th>
                    <th style="width: 5%;">PUBLICADO</th>
                    <th class="text-end" style="width: 20%;">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td><img src="{{ asset('storage/' . $blog->imagem) }}" alt="Imagem" style="width: 150px; height: 80px;"></td>   
                    <td>{{ $blog->titulo }}</td>
                    <td>{{ $blog->created_at->format('d/m/Y') }}</td>
                    <td>{{ $blog->data_publicacao_formatada }}</td>
                    <td>{{ $blog->publicado ? 'Sim' : 'Não' }}</td>
                    <td class="text-end">
                        <div class="d-inline">
                            <a href="{{  route('blog-edit', ['id' => $blog->id]) }}" class="btn btn-primary btn-sm ms-1" style="padding: 2px 8px; font-size: 12px;" type="button">
                                <i class="fas fa-pen me-1"></i> Editar
                            </a>
                            <form action="{{ route('blog-delete', ['id' => $blog->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm ms-1" style="padding: 2px 8px; font-size: 12px;" type="submit">
                                    <i class="fa-solid fa-trash-can me-1"></i> Excluir
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Certifique-se de incluir os links do DataTables -->
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" rel="stylesheet">

    <!-- jQuery (necessário para o DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- JavaScript do DataTables -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        new DataTable('#example', {
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