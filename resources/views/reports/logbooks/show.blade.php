@extends('layouts.main')

@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/reports">Relatórios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Logbooks</li>
        </ol>
    </nav>
@endsection

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuário</th>
                <th scope="col">Título</th>
                <th scope="col">Data criação</th>
                <th scope="col">Data Atualização</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($logbooks as $logbook)

                @foreach ($logbook->logbooks as $item)

                    <tr style="cursor: pointer" onclick="location.href='/reports/logbooks/{{ $item->id }}'">
                        <th scope="row"> {{ $item->id }}</th>
                        <td>{{ $logbook->name }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->updated_at)) }}</td>
                    </tr>

                @endforeach

            @endforeach
        </tbody>


    </table>

    
@endsection
