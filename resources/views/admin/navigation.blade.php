<nav class="col-md-2 d-none d-md-block bg-light sidebar" aria-label="{{ __('Main Menu') }}">
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