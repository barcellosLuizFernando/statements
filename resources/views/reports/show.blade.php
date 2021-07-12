@extends('layouts.main')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Relatórios</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-file-alt"></i> Políticas de contabilização</h5>
                <a href="/reports/accountingpolicies" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Acessar</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-file-alt"></i> Logbooks</h5>
                <a href="/reports/logbooks" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Acessar</a>
            </div>
        </div>
    </div>
</div>
@endsection
