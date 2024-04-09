<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container">
        <a href="{{ route('main') }}" class="navbar-brand">
            {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">

            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('tasks.index') }}" class="nav-link" aria-current="page">
                        {{ __('Задачи') }}
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                @guest
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link" aria-current="page">
                            {{ __('Регистрация') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link" aria-current="page">
                            {{ __('Вход') }}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
