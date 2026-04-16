@extends('layouts.site')

@section('title', __('site.rules.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.rules.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.rules.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10 text-sm">
        @php
            $regimentoPdf = asset('Novo-Regimento-Comum-das-Etecs-2022.pdf');
        @endphp

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                <h2 class="font-semibold text-gray-900">{{ __('site.rules.download_title') }}</h2>
                <a href="{{ $regimentoPdf }}" target="_blank"
                   class="inline-flex items-center bg-etecRed text-white text-xs font-semibold px-3 py-1.5 rounded-full hover:bg-etecRedDark transition">
                    {{ __('site.rules.download_button') }}
                </a>
            </div>

            <p class="text-xs text-gray-600 mb-4">
                {{ __('site.rules.download_text') }}
            </p>

            <div class="w-full h-[76vh] border border-gray-200 rounded-lg overflow-hidden shadow-inner">
                <iframe
                    src="{{ $regimentoPdf }}"
                    class="w-full h-full"
                    title="Regimento Comum ETECs 2022">
                </iframe>
            </div>
        </div>
    </section>
@endsection

