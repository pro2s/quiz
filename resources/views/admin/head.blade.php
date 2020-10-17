<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow navbar-expand-md" aria-label="{{ __('Top Navigation') }}">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3 text-nowrap">
        @include('partials.authlinks')
    </ul>
</nav>
