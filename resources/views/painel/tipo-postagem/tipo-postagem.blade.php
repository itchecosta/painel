@extends('layouts.app-painel')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-0 me-6">
            GERENCIAR TIPOS DE POSTAGEM
            <a class="btn btn-primary btn-sm ms-6" style="padding: 2px 8px; font-size: 12px;" type="button" href="{{ route('tipo-create') }}">
                <i class="fas fa-plus me-2"></i>Adicionar Novo
            </a>
        </h5>

        <nav aria-label="breadcrumb" class="mb-0">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none fw-medium small"><i class="fas fa-home me-2"></i>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none fw-medium small">Gerenciar Tipos de Postagem</a>
                </li>
                <li class="breadcrumb-item active fw-medium small" aria-current="page">Consultar</li>
            </ol>
        </nav>
    </div>

    <x-painel.alert></x-painel.alert>

    <div class="table-responsive mt-4">
        <table id="example" class="table table-striped w-100">
            <thead>
                <tr>
                    <th style="width: 40%;">TIPO DE POSTAGEM</th>
                    {{-- <th style="width: 10%;">ATIVO</th> --}}
                    <th style="width: 10%;">PUBLICADO</th>
                    <th style="width: 10%;">CADASTRO</th>
                    <th class="text-end" style="width: 30%;">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoPostagems as $tipoPostagem)
                <tr>
                    <td>{{ $tipoPostagem->tipo_postagem }}</td>
                    {{-- <td>{{ $tipoPostagem->ativo ? 'Sim' : 'Não' }}</td> --}}
                    <td>{{ $tipoPostagem->publicado ? 'Sim' : 'Não' }}</td>
                    <td>{{ $tipoPostagem->created_at->format('d/m/Y') }}</td>
                    <td class="text-end">
                        <a href="{{ route('tipo-edit', ['id' => $tipoPostagem->id]) }}" class="btn btn-primary btn-sm ms-1" style="padding: 2px 8px; font-size: 12px;" type="button">
                            <i class="fas fa-pen me-1"></i> Editar
                        </a>
                        <form action="{{ route('tipo-delete', ['id' => $tipoPostagem->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm ms-1" style="padding: 2px 8px; font-size: 12px;" type="submit">
                                <i class="fa-solid fa-trash-can me-1"></i> Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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

    <!-- Custom CSS -->
    <style>
        #example thead th {
            background-color: #3c8dbc;
            color: white; 
        }
    </style>
@endsection