@extends('main')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastros</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-building"></i> Empresas</h5>
                <p class="card-text">Informe aqui os dados gerais das empresas que irá controlar neste aplicativo.</p>
                <a href="/reg/companies" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Acessar</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-list-alt"></i> Categorias</h5>
                <p class="card-text">Categorias são utilizadas para filtrar e classificar.</p>
                <a href="reg/categories" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Acessar</a>
            </div>
        </div>
    </div>
</div>
@endsection
