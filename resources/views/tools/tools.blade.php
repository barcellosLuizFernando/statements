@extends('main')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ferramentas</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-4 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Políticas de contabilização</h5>
                    <p class="card-text">Políticas de contabilização.</p>
                    <a href="/tools/accountingpolicies" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Procedimentos Operacionais Padrão</h5>
                    <p class="card-text">Procedimentos Operacionais Padrão (Standard Operational Process)</p>
                    <a href="tools/sop" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Atividades</h5>
                    <p class="card-text">Atividades ("to-do list")</p>
                    <a href="tools/to-do" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Log Book</h5>
                    <p class="card-text">Diário de bordo ( em inglês Log Book) é um instrumento utilizado para
                        registro dos acontecimentos mais importantes.</p>
                    <a href="/tools/logbooks" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Espera 2</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Espera 3</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
