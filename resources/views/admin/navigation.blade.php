<nav class="col-md-2 d-none d-md-block bg-light sidebar" aria-label="{{ __('Main Menu') }}">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ active('dashboard') }}" href="{{ route('dashboard') }}">
            @icon("home")
            {{ __('Dashboard') }} @includeWhen(is_active('dashboard'), 'partials.current')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active('quizzes.*') }}" href="{{ route('quizzes.index') }}">
            @icon("list")
            {{ __('Quizzes') }} @includeWhen(is_active('quizzes.*'), 'partials.current')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active('questions.*') }}" href="{{ route('questions.index') }}">
            @icon("help-circle")
            {{ __('Questions') }} @includeWhen(is_active('questions.*'), 'partials.current')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active('users.*') }}" href="{{ route('users.index') }}">
            @icon("users")
            {{ __('Customers') }} @includeWhen(is_active('users.*'), 'partials.current')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            @icon("award")
            Awards
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            @icon("bar-chart-2")
            Reports
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            @icon("layers")
            Integrations
            </a>
        </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="d-flex align-items-center text-muted" href="#">
            @icon("plus-circle")
        </a>
        </h6>
        <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link" href="#">
            @icon("file-text")
            Current month
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            @icon("file-text")
            Last quarter
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            @icon("file-text")
            Social engagement
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            @icon("file-text")
            Year-end sale
            </a>
        </li>
        </ul>
    </div>
</nav>
