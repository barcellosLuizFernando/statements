@extends('layouts.main')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/reg">Cadastros</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categorias</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <a href="/reg/category" class="btn btn-primary me-md-2" role="button">Criar Categoria</a>
    </div>

    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a href="/reg/category/{{ $category->id }}" class="btn btn-secondary btn-sm" role="button">Editar</a>
                        <form action="/reg/category/{{ $category->id }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE');
                            <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
