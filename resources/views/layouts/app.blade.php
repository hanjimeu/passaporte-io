<!DOCTYPE html>
<html lang="pt-BR" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Passaporte.io' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen bg-base-200 text-base-content">

    <nav class="navbar bg-base-100 border-b border-base-200 px-8 sticky top-0 z-50">
    <div class="flex-1">
        <a href="{{ route('home') }}" class="text-xl font-bold text-primary">
            ✦ Passaporte.io
        </a>
    </div>

    <div class="flex gap-2 items-center">

        <a href="{{ route('home') }}" class="btn btn-ghost">
            Eventos
        </a>

        @auth

            @if(auth()->user()->role === 'participante')
                <a href="{{ route('enrollments.index') }}" class="btn btn-ghost">
                    Meus ingressos
                </a>
            @endif

            @if(auth()->user()->role === 'organizador')
                <a href="{{ route('admin.events.index') }}" class="btn btn-ghost">
                    Painel
                </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline">
                    Sair
                </button>
            </form>

        @else

            <a href="{{ route('login') }}" class="btn btn-outline">
                Entrar
            </a>

            <a href="{{ route('register') }}" class="btn btn-primary">
                Criar conta
            </a>

        @endauth

    </div>
</nav>

    <main class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="flash-message alert alert-success mb-4 transition-opacity duration-500">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="flash-message alert alert-error mb-4 transition-opacity duration-500">
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const messages = document.querySelectorAll('.flash-message');

        messages.forEach(function (message) {
            setTimeout(function () {
                message.classList.add('opacity-0');

                setTimeout(function () {
                    message.remove();
                }, 500);
            }, 5000);
        });
    });
</script>
</body>

</html>