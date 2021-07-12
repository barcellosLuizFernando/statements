<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontawesome/vendor/components/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="icon" href="/img/SteyIco.svg" sizes="any" type="image/svg+xml">


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @yield('headscript')
</head>

<body class="">

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <img class="w-100p" src="/img/SteyLogo.png" alt="Statements">
            </a>

            <div class="">
                <div class="d-flex">
                    <ul class="navbar-nav">
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link"><i class="fas fa-sign-in-alt"></i>
                                Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="fas fa-user-plus"></i>
                                Criar usuário</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                                href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="far fa-user"></i>
                                {{ ucfirst(strtolower(strtok(auth()->user()['name'], " "))) }}</a>

                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="/user/profile"><i class="fas fa-users-cog"></i> Perfil</a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <a href="/logout"
                                            class="dropdown-item"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();"><i class="fas fa-sign-out-alt"></i> Sair</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex">


            <nav class="sidebar col-md-2 d-none d-md-block bg-light mr-5 p-0 min-vh-100">
                <div class="sidebar-sticky">

                        <ul class="nav flex-column">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link active" href="/reg"><i class="fas fa-folder"></i>
                                        Cadastros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/tools"><i class="fas fa-box-open"></i> Ferramentas</a>
                                </li>
                            @endauth
                            <li class="nav-item">
                                <a class="nav-link" href="/reports"><i class="fas fa-file-alt"></i> Relatórios</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/about"><i class="fas fa-question-circle"></i>
                                    Sobre</a>
                            </li>
                        </ul>

                </div>
            </nav>



            <div class="w-fill mt-2 mr-3">

                @yield('title')

                <!-- Page Content -->

                @yield('content')

            </div>

    </div>


    <script src="/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    @yield('bodyscript')
</body>

</html>
