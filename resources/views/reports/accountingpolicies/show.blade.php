@extends('layouts.main')


@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/reports">Relatórios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Políticas de contabilização</li>
        </ol>
    </nav>
@endsection

@section('content')

    @foreach ($companies as $company)
        <div class="mb-5 card shadow">

            <div class="card-header ">
                <div class="row">
                    <div class="col-auto mr-auto"><h5 class="">{{ $company->name }}</h5></div>

                    <div class="col-auto"><span class="">{{ count($company->accountingpolicies) }} políticas contábeis</span></div>
                </div>

            </div>
                <div class="card-body">
                        @foreach($company->accountingpolicies as $policy)
                            <div class="mb-4">
                                <h5 class="card-title"><i class="far fa-arrow-alt-circle-right"></i> {{ $policy->name }}</h5>
                                @foreach($policy->details as $detail)
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Versão</th>
                                                <th scope="col">Início</th>
                                                <th scope="col">Redator</th>
                                                <th scope="col">Revisor</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="cursor: pointer" onclick="location.href='/reports/accountingpolicies/{{ $detail->id }}'">
                                                <th scope="row">{{ $detail->id }}</th>
                                                <td scope="row">{{ $detail->version }}</td>
                                                <td scope="row">{{ date('d/m/Y', strtotime($detail->date_start)) }}</td>
                                                <td scope="row">{{ $detail->user->name }}</td>
                                                <td scope="row">{{ $detail->published == 1 ? $detail->userRev->name : '' }}</td>
                                                <td scope="row">
                                                    @if ($detail->published == 1)
                                                        <i class="far fa-check-square text-success"></i> Publicado
                                                    @else
                                                        <i class="far fa-edit text-warning"></i> Em edição
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>

                        @endforeach
                </div>

        </div>
    @endforeach

@endsection
