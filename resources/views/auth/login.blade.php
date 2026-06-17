@extends('layouts.app')

@section('content')

<div class="min-h-[80vh] flex items-center justify-center bg-[#FFFDFE] px-4">

    <div class="w-full max-w-md">

        <div class="card bg-[#FFF7FB] shadow-2xl border border-[#F4D8E8]">

            <div class="card-body p-8">

                <div class="text-center mb-6">

                    <h1 class="text-4xl font-bold text-[#7A3E5B]">
                        Entrar
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Acesse sua conta no Passaporte.io
                    </p>

                </div>

                <form action="{{ route('login.store') }}" method="POST" class="space-y-5">

                    @csrf

                    <div>

                        <label class="label" for="email">
                            <span class="label-text font-medium text-[#7A3E5B]">
                                E-mail
                            </span>
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="seuemail@exemplo.com"
                            class="input input-bordered w-full bg-white @error('email') input-error @enderror"
                        >

                        @error('email')
                            <p class="text-error text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div>

                        <label class="label" for="password">
                            <span class="label-text font-medium text-[#7A3E5B]">
                                Senha
                            </span>
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Digite sua senha"
                            class="input input-bordered w-full bg-white @error('password') input-error @enderror"
                        >

                        @error('password')
                            <p class="text-error text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <button
                        type="submit"
                        class="btn w-full border-0 bg-[#F8C8DC] hover:bg-[#F3B7D0] text-[#7A3E5B]"
                    >
                        Entrar
                    </button>

                </form>

                <div class="divider text-gray-400">
                    ou
                </div>

                <p class="text-center text-sm">

                    Ainda não possui conta?

                    <a
                        href="{{ route('register') }}"
                        class="font-semibold text-[#C86B98] hover:underline"
                    >
                        Criar conta
                    </a>

                </p>

            </div>

        </div>

    </div>

</div>

@endsection