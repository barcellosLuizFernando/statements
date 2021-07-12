@extends('layouts.main')

@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools">Ferramentas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Logbook</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <a href="/tools/logbooks/logbook" class="btn btn-primary me-md-2 " role="button"><i class="far fa-plus-square"></i>
            Criar Logbook</a>

    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Data criação</th>
                <th scope="col">Data atualização</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($logbooks as $logbook)
                <tr>
                    <th scope="row">{{ $logbook->id }}</th>
                    <td>{{ $logbook->title }}</td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($logbook->created_at)) }}</td>
                    <td>{{ date('d/m/Y H:i:s', strtotime($logbook->updated_at)) }}</td>
                    <td>

                        <a href="/tools/logbooks/logbook/{{ $logbook->id }}" class="btn btn-secondary edit-btn btn-sm" role="button"><i class="far fa-edit"></i> Editar</a>
                        <form class="d-inline" action="/tools/logbooks/logbook/{{ $logbook->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Excluir</button>
                        </form>

                    </td>

                </tr>


            @endforeach

        </tbody>

    </table>

@endsection
