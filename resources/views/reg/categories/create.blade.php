@extends('layouts.main')


@section('title')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/reg">Cadastros</a></li>
        <li class="breadcrumb-item"><a href="/reg/categories">Categorias</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @if (isset($category))

                    Editando categoria  "{{ $category->name}}"

            @else
                    Nova categoria
            @endif
        </li>
    </ol>
</nav>
@endsection

@section('content')

<div>

    <form action="/reg/category{{isset($category) ? '/'.$category->id : ''}}" method="POST">
        @csrf
        @if (isset($category))
            @method('PUT')
        @endif

        <div class="mb-3 row">
            <label for="categoryName" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" name="categoryName" class="form-control" id="categoryName"
                @if (isset($category))

                    value="{{ $category->name}}"

                @endif
                required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="categoryDescription" class="col-sm-2 col-form-label">Descrição</label>
            <div class="col-sm-10">
                <textarea name="categoryDescription" id="categoryDescription" class="form-control">@if (isset($category)){{ $category->description }}@endif</textarea>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Gravar Categoria">
        <a href="/reg/categories" class="btn btn-warning" type="submit" >Cancelar</a>

    </form>

</div>

@endsection
