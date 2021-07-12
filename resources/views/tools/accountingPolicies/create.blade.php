@extends('layouts.main')


@section('title')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools">Ferramentas</a></li>
        <li class="breadcrumb-item"><a href="/tools/accountingpolicies">Políticas de Contabilização</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @if (isset($policy))

                    Editando política  "{{ $policy->name }}"

            @else
                    Nova política de contabilização
            @endif
        </li>
    </ol>
</nav>
@endsection

@section('content')

    <div>

        <form action="/tools/accountingpolicy{{isset($policy) ? '/' . $policy->id : ''}}" method="POST">

            @csrf
            @if (isset($policy))
                @method('PUT')
            @endif

            <div class="mb-3 row">
                <label for="policyName" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" name="policyName" class="form-control" id="policyName"
                    @if (isset($policy))

                        value="{{ $policy->name }}"

                    @endif
                    required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="companyName" class="col-sm-2 col-form-label">Empresa</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="companyName" name="companyName" id="companyName" required>

                        @if  (count($companies) != 1)
                            <option disabled value="0"></option>

                        @endif

                        @if ($companies)
                            @foreach ($companies as $company)
                                <option  value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        @endif
                      </select>
                </div>
            </div>

            <input class="btn btn-primary" type="submit" value="Gravar Política">
            <a href="/tools/accountingpolicies" class="btn btn-warning" type="submit" >Cancelar</a>

        </form>


    </div>



@endsection
