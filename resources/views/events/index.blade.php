 @extends('layouts.app')

@section('content')
<style>
.org-wrap { max-width:1000px;margin:0 auto;padding:28px 24px; }
.org-hd { display:flex;justify-content:space-between;align-items:center;margin-bottom:20px; }
.org-title { font-size:18px;font-weight:600;color:var(--text); }

.stats-row { display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:20px; }
.sstat { background:var(--white);border:0.5px solid var(--border);border-radius:14px;padding:16px; }
.sstat-lbl { font-size:11px;font-weight:600;color:var(--hint);text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px; }
.sstat-val { font-size:26px;font-weight:600;color:var(--text); }

.panel { background:var(--white);border:0.5px solid var(--border);border-radius:14px;overflow:hidden; }
.panel-hd { display:flex;justify-content:space-between;align-items:center;padding:14px 20px;border-bottom:0.5px solid var(--border); }
.panel-t { font-size:14px;font-weight:600;color:var(--text); }
.etbl { width:100%;border-collapse:collapse;font-size:13px; }
.etbl th { text-align:left;padding:9px 20px;font-size:10px;font-weight:600;color:var(--hint);text-transform:uppercase;letter-spacing:.05em;background:var(--bg);border-bottom:0.5px solid var(--border); }
.etbl td { padding:13px 20px;border-bottom:0.5px solid var(--border);vertical-align:middle; }
.etbl tr:last-child td { border-bottom:none; }
.etbl tr:hover td { background:var(--tw-50); }
.sbadge { display:inline-block;padding:3px 9px;border-radius:50px;font-size:11px;font-weight:600; }
.sb-a { background:#e2f4e6;color:#2a7040; }
.sb-s { background:var(--fs-100);color:var(--fs-700); }
.sb-f { background:var(--pp-100);color:var(--pp-700); }
.ag { display:flex;gap:6px; }
.ab { font-size:12px;font-weight:500;padding:4px 11px;border-radius:8px;border:none;cursor:pointer;text-decoration:none;font-family:inherit;transition:opacity .15s; }
.ab:hover { opacity:.8; }
.ab-e { background:var(--tw-100);color:var(--tw-700); }
.ab-d { background:#fde8e8;color:#a03030; }
.ab-d:disabled { opacity:.35;cursor:not-allowed; }
.empty-panel { text-align:center;padding:48px 24px;color:var(--hint); }
</style>

<div class="org-wrap">
    <div class="org-hd">
        <div class="org-title">Painel do organizador</div>
        <a href="{{ route('admin.events.create') }}" class="pbtn pbtn-tw">+ Novo evento</a>
    </div>

    @php
        $allEvents = $events->getCollection();
        $totalInscricoes = $allEvents->sum(fn($e) => $e->enrollments_count ?? $e->enrollments->count());
        $totalVagas = $allEvents->sum(fn($e) => ($e->capacity) - ($e->enrollments_count ?? $e->enrollments->count()));
    @endphp
    <div class="stats-row">
        <div class="sstat"><div class="sstat-lbl">Total de eventos</div><div class="sstat-val">{{ $events->total() }}</div></div>
        <div class="sstat"><div class="sstat-lbl">Total de inscrições</div><div class="sstat-val">{{ $totalInscricoes }}</div></div>
        <div class="sstat"><div class="sstat-lbl">Vagas restantes</div><div class="sstat-val">{{ $totalVagas }}</div></div>
    </div>

    <div class="panel">
        <div class="panel-hd"><div class="panel-t">Meus eventos</div></div>
        <table class="etbl">
            <thead>
                <tr>
                    <th>Evento</th><th>Data</th><th>Inscritos</th><th>Status</th><th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    @php
                        $cnt = $event->enrollments_count ?? $event->enrollments->count();
                        $cap = $event->capacity;
                        $full = $cnt >= $cap;
                        $past = $event->date_time->isPast();
                        $soon = !$past && $event->date_time->diffInDays(now()) <= 3;
                        $status = $full ? 'Lotado' : ($past ? 'Encerrado' : ($soon ? 'Em breve' : 'Ativo'));
                        $sc = ($full || $past) ? 'sb-f' : ($soon ? 'sb-s' : 'sb-a');
                    @endphp
                    <tr>
                        <td style="font-weight:500">{{ $event->title }}</td>
                        <td style="color:var(--muted)">{{ $event->date_time->format('d/m/Y') }}</td>
                        <td>{{ $cnt }} / {{ $cap }}</td>
                        <td><span class="sbadge {{ $sc }}">{{ $status }}</span></td>
                        <td>
                            <div class="ag">
                                <a href="{{ route('admin.events.edit', $event) }}" class="ab ab-e">Editar</a>
                                <form method="POST" action="{{ route('admin.events.destroy', $event) }}" style="margin:0">
                                    @csrf @method('DELETE')
                                    <button class="ab ab-d" {{ $cnt > 0 ? 'disabled title=Evento com inscritos não pode ser excluído' : '' }}
                                        onclick="return {{ $cnt > 0 ? 'false' : 'confirm(\'Excluir este evento?\')' }}">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty-panel">
                        Nenhum evento criado ainda.
                        <a href="{{ route('admin.events.create') }}" style="color:var(--tw-700)">Criar agora</a>
                    </td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:16px">{{ $events->links() }}</div>
</div>
@endsection