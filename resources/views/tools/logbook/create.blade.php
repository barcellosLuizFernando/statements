@extends('layouts.main')

@section('headscript')

    <script src="/src/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

@endsection

@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/tools">Ferramentas</a></li>
            <li class="breadcrumb-item"><a href="/tools/logbooks">Logbook</a></li>
            <li class="breadcrumb-item active" aria-current="page">Novo logbook</li>

        </ol>
    </nav>
@endsection

@section('content')
    <div class="mt-3">

    </div>
    <form action="/tools/logbooks/logbook{{ isset($logbook) ? '/' . $logbook->id : '' }} " method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($logbook))
            @method('PUT')
        @endif

        <div class="mb-3 ">
            <label for="logbookTitle" class="">Título</label>
            <div class="mt-2">
                <input type="text" name="logbookTitle" class="form-control" id="logbookTitle"
                @if (isset($logbook))

                    value="{{ $logbook->title }}"

                @else
                    value="Atividades do dia {{ date('d/m/Y') }} "
                @endif
                required>
            </div>
        </div>

        <div class="mb-3">
            <label for="logbooktext" class="mb-2">Texto</label>
            <div class="">
                <textarea name="logbooktext">

                    @if (isset($logbook))
                        {{ $logbook->text }}
                    @endif

                </textarea>
            </div>
        </div>

        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Gravar logbook">
            <a href="/tools/logbooks" class="btn btn-warning" type="submit">Cancelar</a>
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
