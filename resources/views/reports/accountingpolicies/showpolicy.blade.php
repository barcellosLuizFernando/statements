@extends('layouts.main')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/reports">Relatórios</a></li>
        <li class="breadcrumb-item"><a href="/reports/accountingpolicies">Políticas de contabilização</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$detail->accountingpolicy->company->name . ': ' .  $detail->accountingpolicy->name}}</li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="card shadow printable">
        <div class="card-body">
        <table class="table">
            <tr>
                <td class="td-img-policy"><img src="/img/companies/{{ $detail->accountingpolicy->company->logo }}" alt="companylogo"></td>
                <td colspan="3">
                    <div class="p-3">
                        <h5 class="card-title">{{$detail->accountingpolicy->company->name}}</h5>
                        <h5 class="card-title">Política de contabilização</h5>
                        <h3>{{strtoupper($detail->accountingpolicy->name)}}</h3>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Redator responsável</th>
                <td colspan="3">{{ $detail->user->name }}</td>
            </tr>
            <tr>
                <th>Revisor responsável</th>
                <td colspan="3">{{ $detail->published == 1 ? $detail->userRev->name : '' }}</td>
            </tr>
            <tr>
                <th>Número de ordem</th>
                <td colspan="3">{{ str_pad($detail->id, 4, '0', STR_PAD_LEFT) . '/' . date('Y', strtotime($detail->date_start)) }}</td>
            </tr>
            <tr>
                <th>Versão</th>
                <th>Data de aprovação</th>
                <th>Início da vigência</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>{{$detail->version}}.0</td>
                <td>{{$detail->published == 1 ? date('d/m/Y', strtotime($detail->updated_at)) : ''}}</td>
                <td>{{date('d/m/Y', strtotime($detail->date_start))}}</td>
                <td>{{ $detail->published == 1 ? 'Publicado' : 'Em edição'}}</td>
            </tr>
        </table>

        {!! $detail->text !!}

        </div>
        <div class="card-footer">
            <p class="mb-0">Política de contabilização - {{ $detail->accountingpolicy->name }}</p>
            <p class="mt-0">Versão: {{$detail->version}}.0</p>
        </div>

    </div>
@endsection
