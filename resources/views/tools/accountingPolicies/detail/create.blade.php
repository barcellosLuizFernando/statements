@extends('layouts.main')

@section('headscript')

    <script src="/src/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

@endsection

@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/tools">Ferramentas</a></li>
        <li class="breadcrumb-item"><a href="/tools/accountingpolicies">Políticas de Contabilização</a></li>
        <li class="breadcrumb-item"><a href="/tools/accountingpolicydetail/{{ $policy->id }}">{{$company->name . ': ' . $policy->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">@if (isset($detail)) Editando "{{ $policy->name }}" - Versão {{ $detail->version }} @else Criar detalhamento @endIf </li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="mt-3">
        <h5> {{ $company->name}}</h5>
        <h1> {{ $policy->name}}</h1>
    </div>

    <form action="/tools/accountingpolicydetail/{{ $policy->id }}{{ isset($detail) ? "/" . $detail->id : '' }} " method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($detail))
            @method('PUT')
        @endif

        <textarea name="detailtext">

            @if (isset($detail))
                {{ $detail->text }}
            @endif

        </textarea>

        <div class="mt-3">
            <input class="btn btn-primary" type="submit" value="Gravar detalhamento">
            <a href="/tools/accountingpolicydetail/{{ $policy->id }}" class="btn btn-warning" type="submit" >Cancelar</a>
        </div>


    </form>

@endsection

@section('bodyscript')

    <script>
        tinymce.init({
            selector: 'textarea',
            language: 'pt_BR',
            plugins: 'advlist autolink lists link image charmap preview hr anchor pagebreak autoresize fullscreen table wordcount',
            toolbar_mode: 'floating',
            advlist_number_styles: 'default,lower-alpha,lower-greek,lower-roman,upper-alpha,upper-roman'

        });
    </script>

@endsection
