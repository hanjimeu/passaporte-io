<style>
.form-wrap { max-width:700px;margin:0 auto;padding:28px 24px; }
.fback { display:inline-flex;align-items:center;gap:6px;font-size:13px;color:var(--muted);text-decoration:none;margin-bottom:20px; }
.fback:hover { color:var(--text); }
.fcard { background:var(--white);border:0.5px solid var(--border);border-radius:14px;padding:24px; }
.fcard-title { font-size:16px;font-weight:600;color:var(--text);margin-bottom:20px; }
.frow { display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:16px; }
@media(max-width:540px){ .frow{grid-template-columns:1fr} }
.ffield { margin-bottom:16px; }
.fhint { font-size:11px;color:var(--hint);margin-top:4px; }
textarea.pinput { min-height:100px;resize:vertical; }
.fsubmit { width:100%;padding:11px;border-radius:10px;border:none;background:var(--tw-100);color:var(--tw-700);font-size:14px;font-weight:600;cursor:pointer;margin-top:6px;font-family:inherit;transition:background .15s; }
.fsubmit:hover { background:var(--tw-300); }
.banner-prev { margin-top:8px;border-radius:10px;overflow:hidden;max-height:140px; }
.banner-prev img { width:100%;object-fit:cover;max-height:140px;display:block; }
</style>

<div class="form-wrap">
    <a href="{{ route('admin.events.index') }}" class="fback">← Voltar ao painel</a>
    <div class="fcard">
        <div class="fcard-title">{{ isset($event) ? 'Editar evento' : 'Criar novo evento' }}</div>

        @if(isset($event))
            <form method="POST" action="{{ route('admin.events.update', $event) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
        @else
            <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf
        @endif

        <div class="ffield">
            <label class="plabel">Título *</label>
            <input class="pinput" type="text" name="title" value="{{ old('title', $event->title ?? '') }}" placeholder="Nome do evento" required>
            @error('title')<p class="perror">{{ $message }}</p>@enderror
        </div>

        <div class="ffield">
            <label class="plabel">Descrição *</label>
            <textarea class="pinput" name="description" placeholder="Descreva o evento...">{{ old('description', $event->description ?? '') }}</textarea>
            @error('description')<p class="perror">{{ $message }}</p>@enderror
        </div>

        <div class="frow">
            <div>
                <label class="plabel">Data e horário *</label>
                <input class="pinput" type="datetime-local" name="date_time"
                    value="{{ old('date_time', isset($event) ? $event->date_time->format('Y-m-d\TH:i') : '') }}" required>
                <p class="fhint">Deve ser uma data futura</p>
                @error('date_time')<p class="perror">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="plabel">Vagas *</label>
                <input class="pinput" type="number" name="capacity" min="1"
                    value="{{ old('capacity', $event->capacity ?? '') }}" placeholder="Ex: 100" required>
                @error('capacity')<p class="perror">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="frow">
            <div>
                <label class="plabel">Local *</label>
                <input class="pinput" type="text" name="location"
                    value="{{ old('location', $event->location ?? '') }}" placeholder="Cidade, Estado" required>
                @error('location')<p class="perror">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="plabel">Categoria *</label>
                <select class="pinput" name="category_id" required>
                    <option value="">Selecione...</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $event->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<p class="perror">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="ffield">
            <label class="plabel">Banner (imagem)</label>
            <input class="pinput" type="file" name="banner" accept="image/*">
            <p class="fhint">Máximo 2MB. Formatos: JPG, PNG, GIF, WEBP.</p>
            @if(isset($event) && $event->banner_path)
                <div class="banner-prev">
                    <img src="{{ asset('storage/'.$event->banner_path) }}" alt="Banner atual">
                </div>
                <p class="fhint" style="margin-top:6px">Banner atual — envie uma nova imagem para substituir.</p>
            @endif
            @error('banner')<p class="perror">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="fsubmit">
            {{ isset($event) ? 'Salvar alterações' : 'Criar evento' }}
        </button>
        </form>
    </div>
</div>
EOF

cat > "$BASE/resources/views/admin/events/create.blade.php" << 'EOF'
@extends('layouts.app')
@section('content')
@include('admin.events._form')
@endsection
EOF

cat > "$BASE/resources/views/admin/events/edit.blade.php" << 'EOF'
@extends('layouts.app')
@section('content')
@include('admin.events._form')
@endsection