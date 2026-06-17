

@section('content')
<style>
.enr-wrap { max-width: 800px; margin: 0 auto; padding: 28px 24px; }
.page-hd { display:flex;justify-content:space-between;align-items:baseline;margin-bottom:20px; }
.page-title { font-size:18px;font-weight:600;color:var(--text); }
.page-action { font-size:13px;color:var(--tw-700);text-decoration:none; }
.page-action:hover { text-decoration:underline; }

.tcard { background:var(--white);border:0.5px solid var(--border);border-radius:14px;display:flex;align-items:center;gap:14px;padding:14px 16px;margin-bottom:10px;transition:box-shadow .15s; }
.tcard:hover { box-shadow:0 2px 14px rgba(0,0,0,.07); }
.tstripe { width:4px;border-radius:2px;align-self:stretch;flex-shrink:0; }
.tinfo { flex:1;min-width:0; }
.tname { font-size:14px;font-weight:500;color:var(--text); }
.tdate { font-size:12px;color:var(--muted);margin-top:3px;display:flex;align-items:center;gap:5px; }
.tcode { font-size:12px;font-weight:700;padding:4px 12px;border-radius:50px;font-family:monospace;letter-spacing:.05em;flex-shrink:0;background:var(--tw-100);color:var(--tw-700); }
.tcancelb { font-size:12px;color:var(--muted);cursor:pointer;padding:5px 10px;border-radius:8px;border:none;background:none;font-family:inherit;flex-shrink:0; }
.tcancelb:hover { background:#fde8e8;color:#a03030; }

.empty-box { text-align:center;padding:56px 24px;color:var(--hint);background:var(--white);border:0.5px solid var(--border);border-radius:14px; }
</style>

<div class="enr-wrap">
    <div class="page-hd">
        <div class="page-title">Meus ingressos</div>
        <a href="{{ route('home') }}" class="page-action">Explorar mais eventos</a>
    </div>

    @forelse($events as $event)
        @php
            $stripes = ['var(--tw-300)','var(--pp-300)','var(--rd-300)','var(--fs-700)','var(--aj-700)','var(--ra-700)'];
            $sc = $stripes[$event->id % 6];
        @endphp
        <div class="tcard">
            <div class="tstripe" style="background:{{ $sc }}"></div>
            <div class="tinfo">
                <div class="tname">{{ $event->title }}</div>
                <div class="tdate">📅 {{ $event->date_time->format('d/m/Y · H:i') }} — {{ $event->location }}</div>
            </div>
            <span class="tcode">{{ $event->pivot->ticket_code }}</span>
            <form method="POST" action="{{ route('enrollments.destroy', $event) }}" style="margin:0">
                @csrf @method('DELETE')
                <button class="tcancelb" onclick="return confirm('Cancelar inscrição em {{ addslashes($event->title) }}?')">Cancelar</button>
            </form>
        </div>
    @empty
        <div class="empty-box">
            <p style="font-size:36px;margin-bottom:12px">🎠</p>
            <p>Você ainda não tem ingressos.</p>
            <a href="{{ route('home') }}" class="pbtn pbtn-tw" style="display:inline-block;margin-top:14px">Ver eventos</a>
        </div>
    @endforelse

    <div style="margin-top:16px">{{ $events->links() }}</div>
</div>
@endsection