@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-8">

    <div>
        <h1 class="text-4xl font-bold">
            Painel do Organizador
        </h1>

        <p class="text-base-content/70 mt-2">
            Gerencie os eventos criados por você.
        </p>
    </div>

    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
        + Novo Evento
    </a>

</div>

@if ($events->count())

    <div class="stats shadow w-full mb-8">

        <div class="stat">
            <div class="stat-title">
                Total de Eventos
            </div>

            <div class="stat-value">
                {{ $events->count() }}
            </div>
        </div>

        <div class="stat">
            <div class="stat-title">
                Eventos Ativos
            </div>

            <div class="stat-value">
                {{ $events->count() }}
            </div>
        </div>

        <div class="stat">
            <div class="stat-title">
                Página Atual
            </div>

            <div class="stat-value">
                {{ $events->currentPage() }}
            </div>
        </div>

    </div>

    <div class="card bg-base-100 shadow-xl">

        <div class="card-body">

            <div class="overflow-x-auto">

                <table class="table table-zebra">

                    <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Data</th>
                            <th>Local</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($events as $event)

                            <tr>

                                <td>
                                    <div class="font-bold">
                                        {{ $event->title }}
                                    </div>
                                </td>

                                <td>
                                    {{ $event->date_time->format('d/m/Y H:i') }}
                                </td>

                                <td>
                                    {{ $event->location }}
                                </td>

                                <td>

                                    <div class="flex gap-2">

                                        <a
                                            href="{{ route('admin.events.edit', $event) }}"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="{{ route('admin.events.destroy', $event) }}"
                                            method="POST"
                                            onsubmit="return confirm('Tem certeza que deseja excluir este evento?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-error btn-sm"
                                            >
                                                Excluir
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="mt-6">
                {{ $events->links() }}
            </div>

        </div>

    </div>

@else

    <div class="card bg-base-100 shadow-xl">

        <div class="card-body text-center py-12">

            <h2 class="text-2xl font-bold">
                Nenhum evento cadastrado
            </h2>

            <p class="text-base-content/70 mt-2">
                Crie seu primeiro evento para começar.
            </p>

            <div class="mt-4">

                <a
                    href="{{ route('admin.events.create') }}"
                    class="btn btn-primary"
                >
                    Cadastrar Evento
                </a>

            </div>

        </div>

    </div>

@endif

@endsection