@extends('layouts.site')

@section('title', __('site.contact.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.contact.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.contact.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8 text-sm">
        <div class="md:col-span-2">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 border border-green-200 px-4 py-3 text-green-800 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('site.contato.enviar') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1" for="nome">{{ __('site.contact.name') }}</label>
                    <input id="nome" name="nome" type="text"
                           value="{{ old('nome') }}"
                           class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-200 @error('nome') border-red-400 @enderror">
                    @error('nome')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1" for="email">{{ __('site.contact.email') }}</label>
                        <input id="email" name="email" type="email"
                               value="{{ old('email') }}"
                               class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-200 @error('email') border-red-400 @enderror">
                        @error('email')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1" for="assunto">{{ __('site.contact.subject') }}</label>
                        <input id="assunto" name="assunto" type="text"
                               value="{{ old('assunto') }}"
                               class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-200 @error('assunto') border-red-400 @enderror">
                        @error('assunto')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1" for="mensagem">{{ __('site.contact.message') }}</label>
                    <textarea id="mensagem" name="mensagem" rows="4"
                              class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-200 @error('mensagem') border-red-400 @enderror">{{ old('mensagem') }}</textarea>
                    @error('mensagem')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="inline-flex items-center bg-etecRed text-white text-sm font-semibold px-5 py-2 rounded-md shadow hover:bg-etecRedDark transition">
                    {{ __('site.contact.send') }}
                </button>

                <p class="text-xs text-gray-500">
                    {{ __('site.contact.demo') }}
                </p>
            </form>
        </div>
        <aside class="space-y-4">
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <h2 class="font-semibold text-gray-900 mb-1">{{ __('site.contact.address_title') }}</h2>
                <p class="text-gray-700 text-xs mb-2">
                    {{ __('site.contact.full_address') }}<br>
                    {{ __('site.contact.phone_full') }}
                </p>
                <p class="text-gray-700 text-xs">
                    {{ __('site.contact.hours_full') }}
                </p>
            </div>
        </aside>
    </section>
@endsection

