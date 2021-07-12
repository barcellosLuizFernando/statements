@extends('layouts.main')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools">Ferramentas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Políticas de Contabilização</li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <a href="/tools/accountingpolicy" class="btn btn-primary me-md-2" role="button"><i class="far fa-plus-square"></i> Criar Política</a>
    </div>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Empresa</th>
                <th scope="col">Ações</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($policies as $policy)
                <tr>
                    <th scope="row">{{ $policy->id }}</th>
                    <td>{{ $policy->name }}</td>
                    <td>{{ $policy->companyName }}</td>
                    <td>

                        <a href="/tools/accountingpolicy/{{ $policy->id }}" class="btn btn-secondary edit-btn btn-sm" role="button"><i class="far fa-edit"></i> Editar</a>
                        <a href="/tools/accountingpolicydetail/{{ $policy->id }}" class="btn btn-secondary btn-sm" role="button"><i class="fas fa-external-link-alt"></i> Acessar</a>
                        <form class="d-inline" action="/tools/accountingpolicy/{{ $policy->id }}" method="POST">
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
