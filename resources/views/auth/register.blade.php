@extends('layouts.app')

@section('content')
<style>
.auth-wrap { min-height:80vh;display:flex;align-items:center;justify-content:center;padding:32px 24px; }
.auth-card { width:100%;max-width:560px;background:var(--white);border:0.5px solid var(--border);border-radius:14px;padding:32px; }
.auth-title { font-size:22px;font-weight:600;color:var(--text);margin-bottom:4px; }
.auth-sub { font-size:13px;color:var(--muted);margin-bottom:24px; }
.ffield { margin-bottom:14px; }
.role-grid { display:grid;grid-template-columns:1fr 1fr;gap:10px;margin:8px 0 16px; }
.role-opt { border:1.5px solid var(--border-md);border-radius:10px;padding:14px 12px;cursor:pointer;text-align:center;background:var(--white);transition:all .15s; }
.role-opt:hover { border-color:var(--tw-300);background:var(--tw-50); }
.role-opt input { display:none; }
.role-opt input:checked + .role-inner { opacity:1; }
.role-opt.checked-p { border-color:var(--tw-300);background:var(--tw-50); }
.role-opt.checked-o { border-color:var(--pp-300);background:var(--pp-50); }
.role-icon { font-size:22px;margin-bottom:6px; }
.role-name { font-size:13px;font-weight:500;color:var(--text); }
.role-sub  { font-size:11px;color:var(--hint);margin-top:2px; }
.divider-line { display:flex;align-items:center;gap:12px;margin:20px 0;font-size:12px;color:var(--hint); }
.divider-line::before,.divider-line::after { content:'';flex:1;height:0.5px;background:var(--border); }
</style>

<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-title">Criar conta</div>
        <div class="auth-sub">Cadastre-se para acessar o Passaporte.io</div>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="ffield">
                <label class="plabel">Nome completo</label>
                <input class="pinput" type="text" name="name" value="{{ old('name') }}" placeholder="Seu nome" required>
                @error('name')<p class="perror">{{ $message }}</p>@enderror
            </div>

            <div class="ffield">
                <label class="plabel">E-mail</label>
                <input class="pinput" type="email" name="email" value="{{ old('email') }}" placeholder="seu@email.com" required>
                @error('email')<p class="perror">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="plabel">Perfil</label>
                <div class="role-grid" id="role-grid">
                    <label class="role-opt {{ old('role') === 'participante' ? 'checked-p' : '' }}" id="opt-p">
                        <input type="radio" name="role" value="participante" {{ old('role') === 'participante' ? 'checked' : '' }}>
                        <div class="role-icon">🎟</div>
                        <div class="role-name">Participante</div>
                        <div class="role-sub">Quero me inscrever</div>
                    </label>
                    <label class="role-opt {{ old('role') === 'organizador' ? 'checked-o' : '' }}" id="opt-o">
                        <input type="radio" name="role" value="organizador" {{ old('role') === 'organizador' ? 'checked' : '' }}>
                        <div class="role-icon">📅</div>
                        <div class="role-name">Organizador</div>
                        <div class="role-sub">Quero criar eventos</div>
                    </label>
                </div>
                @error('role')<p class="perror">{{ $message }}</p>@enderror
            </div>

            <div class="ffield">
                <label class="plabel">Senha</label>
                <input class="pinput" type="password" name="password" placeholder="Mínimo 8 caracteres" required>
                @error('password')<p class="perror">{{ $message }}</p>@enderror
            </div>

            <div class="ffield">
                <label class="plabel">Confirmar senha</label>
                <input class="pinput" type="password" name="password_confirmation" placeholder="Repita a senha" required>
            </div>

            <button type="submit" class="pbtn pbtn-tw" style="width:100%;padding:11px;font-size:14px;margin-top:4px">
                Criar minha conta
            </button>
        </form>

        <div class="divider-line">ou</div>
        <p style="text-align:center;font-size:13px;color:var(--muted)">
            Já tem conta?
            <a href="{{ route('login') }}" style="color:var(--tw-700);font-weight:600">Entrar</a>
        </p>
    </div>
</div>

<script>
document.querySelectorAll('input[name="role"]').forEach(radio => {
    radio.addEventListener('change', () => {
        document.getElementById('opt-p').classList.remove('checked-p');
        document.getElementById('opt-o').classList.remove('checked-o');
        if (radio.value === 'participante') document.getElementById('opt-p').classList.add('checked-p');
        if (radio.value === 'organizador')  document.getElementById('opt-o').classList.add('checked-o');
    });
});
</script>
@endsection
EOF

cat > "$BASE/resources/views/auth/login.blade.php" << 'EOF'
@extends('layouts.app')

@section('content')
<div class="auth-wrap" style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding:32px 24px">
    <div style="width:100%;max-width:420px;background:var(--white);border:0.5px solid var(--border);border-radius:14px;padding:32px">
        <div style="font-size:22px;font-weight:600;color:var(--text);margin-bottom:4px">Entrar</div>
        <div style="font-size:13px;color:var(--muted);margin-bottom:24px">Acesse sua conta no Passaporte.io</div>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <div style="margin-bottom:14px">
                <label class="plabel">E-mail</label>
                <input class="pinput" type="email" name="email" value="{{ old('email') }}" placeholder="seu@email.com" required>
                @error('email')<p class="perror">{{ $message }}</p>@enderror
            </div>
            <div style="margin-bottom:20px">
                <label class="plabel">Senha</label>
                <input class="pinput" type="password" name="password" placeholder="Sua senha" required>
                @error('password')<p class="perror">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="pbtn pbtn-tw" style="width:100%;padding:11px;font-size:14px">
                Entrar
            </button>
        </form>

        <div style="display:flex;align-items:center;gap:12px;margin:20px 0;font-size:12px;color:var(--hint)">
            <span style="flex:1;height:0.5px;background:var(--border);display:block"></span>
            ou
            <span style="flex:1;height:0.5px;background:var(--border);display:block"></span>
        </div>
        <p style="text-align:center;font-size:13px;color:var(--muted)">
            Ainda não tem conta?
            <a href="{{ route('register') }}" style="color:var(--tw-700);font-weight:600">Criar conta</a>
        </p>
    </div>
</div>
@endsection