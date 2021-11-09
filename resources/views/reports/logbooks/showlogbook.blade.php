@extends('layouts.main');

@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/reports">Relatórios</a></li>
            <li class="breadcrumb-item"><a href="/reports/logbooks">Logbooks</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $logbook->user->name . ' - ' . $logbook->title }}</li>
        </ol>
    </nav>
@endsection

@section('content')

<div class="card shadow" >
    <div class="card-body">
      <h5 class="card-title">{{$logbook->title}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{$logbook->user->name}}</h6>
      <p class="card-text">{!! $logbook->text !!}</p>
      
      <hr>
      <a href="/reports/logbooks" class="card-link">Voltar</a>
    </div>
    <div class="card-footer text-center text-muted">
        {{ 'Criado em: ' . date('d/m/Y H:i:s', strtotime($logbook->created_at)) . '. Atualizado em: ' . date('d/m/Y H:i:s', strtotime($logbook->updated_at)) }}
      </div>
  </div>

    
@endsection