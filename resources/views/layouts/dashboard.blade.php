<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.favicons')
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    <script src="{{ asset('js/vendor.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow navbar-expand-md">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3 text-nowrap">
                @include('partials.authlinks')
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ active('dashboard') }}" href="{{ route('dashboard') }}">
                            <span data-feather="home"></span>
                            {{ __('Dashboard') }} @includeWhen(is_active('dashboard'), 'partials.current')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active('quizzes.*') }}" href="{{ route('quizzes.index') }}">
                            <span data-feather="list"></span> 
                            {{ __('Quizzes') }} @includeWhen(is_active('quizzes.*'), 'partials.current')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active('questions.*') }}" href="{{ route('questions.index') }}">
                            <span data-feather="help-circle"></span> 
                            {{ __('Questions') }} @includeWhen(is_active('questions.*'), 'partials.current')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active('users.*') }}" href="{{ route('users.index') }}">
                            <span data-feather="users"></span> 
                            {{ __('Customers') }} @includeWhen(is_active('users.*'), 'partials.current')
                            </a>    
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="award"></span>
                            Awards
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                            </a>
                        </li>
                        </ul>
            
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                            </a>
                        </li>
                        </ul>
                    </div>
                </nav>
                    
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">@yield('title')</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            @section('buttons')
                            <div class="btn-group mr-2">
                                <button class="btn btn-sm btn-outline-secondary">Share</button>
                                <button class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                            </button>
                            @show
                        </div>
                    </div>
                    @yield('content')
                </main>
            </div>
        </div> 
        <notifications group="error" position="top right" width="400px"></notifications>
        <dialogs-wrapper transition-name="fade"></dialogs-wrapper>
    </div>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
</body>
</html>
