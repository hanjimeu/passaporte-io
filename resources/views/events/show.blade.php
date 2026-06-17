@extends('layouts.app')

@section('content')
<style>
.show-wrap { max-width: 1000px; margin: 0 auto; padding: 28px 24px; }
.back { display:inline-flex;align-items:center;gap:6px;font-size:13px;color:var(--muted);text-decoration:none;margin-bottom:20px; }
.back:hover { color:var(--text); }
.show-grid { display:grid;grid-template-columns:1fr 300px;gap:20px; }
@media(max-width:700px){ .show-grid{grid-template-columns:1fr} }

.show-main { background:var(--white);border:0.5px solid var(--border);border-radius:14px;overflow:hidden; }
.show-banner-img { width:100%;height:200px;object-fit:cover;display:block; }
.show-banner-empty { height:200px;display:flex;align-items:center;justify-content:center;font-size:60px;background:var(--tw-50); }
.show-body { padding:22px; }
.show-cat { display:inline-block;font-size:10px;font-weight:600;padding:3px 10px;border-radius:50px;background:var(--tw-100);color:var(--tw-700);margin-bottom:10px; }
.show-title { font-size:22px;font-weight:600;color:var(--text);margin-bottom:10px;line-height:1.3; }
.show-meta { display:flex;align-items:center;gap:7px;font-size:13px;color:var(--muted);margin-bottom:6px; }
.show-desc { font-size:13px;color:var(--muted);line-height:1.75;margin-top:16px;padding-top:16px;border-top:0.5px solid var(--border);white-space:pre-line; }

.sidebar { display:flex;flex-direction:column;gap:12px; }
.scard { background:var(--white);border:0.5px solid var(--border);border-radius:14px;padding:16px; }
.scard-lbl { font-size:10px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--hint);margin-bottom:6px; }
.scard-val { font-size:14px;font-weight:600;color:var(--text);margin-bottom:2px; }
.scard-sub { font-size:12px;color:var(--muted); }

.reg-btn { display:block;width:100%;padding:11px;border-radius:10px;border:none;background:var(--tw-100);color:var(--tw-700);font-size:14px;font-weight:600;cursor:pointer;text-align:center;text-decoration:none;transition:background .15s;font-family:inherit; }
.reg-btn:hover { background:var(--tw-300); }
.reg-btn:disabled,.reg-btn.disabled { opacity:.45;cursor:not-allowed;pointer-events:none; }
.cancel-btn { display:block;width:100%;padding:9px;border-radius:10px;border:0.5px solid #f5b8b8;background:#fde8e8;color:#a03030;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;margin-top:8px; }
.cancel-btn:hover { background:#fdd0d0; }
.ticket-box { background:var(--tw-50);border:0.5px solid var(--tw-300);border-radius:10px;padding:14px; }
.ticket-code { font-size:16px;font-weight:700;color:var(--tw-700);font-family:monospace;letter-spacing:.08em; }
.warn-box { background:var(--fs-50);border:0.5px solid #d4b020;border-radius:10px;padding:12px;font-size:12px;color:var(--fs-700); }
</style>

<div class="show-wrap">
    <a href="{{ route('home') }}" class="back">← Voltar aos eventos</a>

    <div class="show-grid">
        {{-- MAIN --}}
        <div class="show-main">
            @if($event->banner_path)
                <img class="show-banner-img" src="{{ asset('storage/'.$event->banner_path) }}" alt="{{ $event->title }}">
            @else
                <div class="show-banner-empty"><span style="color:var(--tw-300)">✦</span></div>
            @endif
            <div class="show-body">
                <span class="show-cat">{{ $event->category->name }}</span>
                <div class="show-title">{{ $event->title }}</div>
                <div class="show-meta">📅 {{ $event->date_time->format('d/m/Y \à\s H:i') }}</div>
                <div class="show-meta">📍 {{ $event->location }}</div>
                <div class="show-meta">👤 Organizado por {{ $event->user->name }}</div>
                <div class="show-desc">{{ $event->description }}</div>
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="sidebar">
            <div class="scard">
                <div class="scard-lbl">Vagas disponíveis</div>
                <div class="scard-val">{{ $available }} de {{ $event->capacity }}</div>
                <div class="spots-bar"><div class="spots-fill" style="width:{{ $event->capacity > 0 ? round($occupied/$event->capacity*100) : 0 }}%"></div></div>
                <div class="scard-sub">{{ $occupied }} inscrições confirmadas</div>
            </div>

            <div class="scard">
                <div class="scard-lbl">Data e horário</div>
                <div class="scard-val">{{ $event->date_time->format('d/m/Y') }}</div>
                <div class="scard-sub">às {{ $event->date_time->format('H:i') }}</div>
            </div>

            <div class="scard">
                <div class="scard-lbl">Local</div>
                <div class="scard-val" style="font-size:13px">{{ $event->location }}</div>
            </div>

            {{-- AÇÃO --}}
            @guest
                <a href="{{ route('login') }}" class="reg-btn">Entrar para se inscrever</a>
            @else
                @if(auth()->user()->role === 'organizador')
                    <div class="warn-box">Organizadores não podem se inscrever em eventos.</div>
                @elseif($alreadyEnrolled)
                    @php $myEnroll = auth()->user()->enrollments()->where('event_id',$event->id)->first(); @endphp
                    <div class="ticket-box">
                        <div class="scard-lbl" style="margin-bottom:4px">Seu ingresso</div>
                        <div class="ticket-code">{{ $myEnroll->ticket_code ?? '—' }}</div>
                    </div>
                    <a href="{{ route('enrollments.index') }}" class="reg-btn" style="background:var(--rd-100);color:var(--rd-700)">Ver meus ingressos</a>
                    <form method="POST" action="{{ route('enrollments.destroy', $event) }}">
                        @csrf @method('DELETE')
                        <button class="cancel-btn" onclick="return confirm('Cancelar inscrição?')">Cancelar inscrição</button>
                    </form>
                @elseif($isFull)
                    <button class="reg-btn disabled" disabled>Vagas esgotadas</button>
                @else
                    <form method="POST" action="{{ route('events.enroll', $event) }}">
                        @csrf
                        <button type="submit" class="reg-btn">🎫 Garantir minha vaga</button>
                    </form>
                @endif
            @endguest
        </div>
    </div>
</div>
@endsection