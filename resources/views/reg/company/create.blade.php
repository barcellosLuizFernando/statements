@extends('layouts.main')


@section('title')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/reg">Cadastros</a></li>
        <li class="breadcrumb-item"><a href="/reg/companies">Cadastro de empresas</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @if (isset($company))

                    Editando empresa  "{{ $company->name}}"

            @else
                    Nova empresa
            @endif
        </li>
    </ol>
</nav>
@endsection

@section('content')

<div class="">

    <form action="/reg/company{{ isset($company) ? '/' . $company->id : '' }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($company))
            @method('PUT')

            <div class="text-center mb-3">
                <img class="w-200p rounded mx-auto" src="/img/companies/{{ $company->logo }}" alt="CompanyLogo" onerror="this.onerror=null; this.src='/img/companies/{{ $company->logo }}'">
            </div>
        @endif

        <div class="mb-3 row">
            <label for="companyName" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" name="companyName" class="form-control" id="companyName"
                @if (isset($company))

                    value="{{ $company->name}}"

                @endif

                required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="emailCompany" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="email" name="emailCompany" class="form-control" id="emailCompany" placeholder="nome@exemplo.com.br"
                @if (isset($company))

                    value="{{ $company->email }}"

                @endif

                required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="logoFile" class="col-sm-2 col-form-label">Logotipo</label>
            <div class="col-sm-10">
                <input class="form-control-file" type="file" id="logoFile" name="logoFile" >
            </div>
        </div>

        <button class="btn btn-primary" type="submit" ><i class="far fa-save"></i> Gravar empresa</button>
        <a href="/reg/companies" class="btn btn-warning" type="submit" ><i class="far fa-times-circle"></i> Cancelar</a>


    </form>

</div>

@endsection
