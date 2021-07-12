@extends('layouts.main')


@section('title')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/reg">Cadastros</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastro de empresas</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="/reg/company" class="btn btn-primary me-md-2 " role="button"><i class="far fa-plus-square"></i> Criar Empresa</a>

</div>

<table class="table table-striped">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <th scope="row">{{ $company->id }}</th>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>
                    <a href="/reg/company/{{ $company->id }}" class="btn btn-secondary btn-sm" role="button"><i class="far fa-edit"></i>
                        Editar</a>
                    <form action="/reg/company/{{ $company->id }}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit"><i class="far fa-trash-alt"></i>
                            Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>



@endsection
