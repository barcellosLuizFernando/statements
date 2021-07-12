@extends('layouts.main')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools">Ferramentas</a></li>
        <li class="breadcrumb-item"><a href="/tools/accountingpolicies">Políticas de Contabilização</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$company->name . ': ' . $policy->name}}</li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <a href="/tools/accountingpolicydetail/{{ $policy->id }}/create" class="btn btn-primary me-md-2" role="button">Criar detalhamento</a>
    </div>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Versão</th>
                <th scope="col">Data Início</th>
                <th scope="col">Status</th>
                <th scope="col">Redator</th>
                <th scope="col">Revisor</th>
                <th scope="col">Expirada</th>
                <th scope="col">Ações</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <th scope="row">{{ $detail->id }}</th>
                    <td>{{ $detail->version }}</td>
                    <td>{{ date('d/m/Y', strtotime($detail->date_start)) }}</td>
                    <td>{{ $detail->published == 0 ? "Em edição" : "Publicado" }}</td>
                    <td>{{ $detail->user->name }}</td>
                    <td>{{ $detail->published == 1 ? $detail->userRev->name : '' }}</td>
                    <td>{{ $detail->expired == 0 ? "Não" : "Sim" }}</td>
                    <td>
                        <a href="/tools/accountingpolicydetail/{{ $policy->id }}/{{ $detail->id }}" class="btn btn-secondary btn-sm" role="button">Editar</a>
                        <form class="d-inline" action="/tools/accountingpolicydetail/{{ $policy->id }}/{{ $detail->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
