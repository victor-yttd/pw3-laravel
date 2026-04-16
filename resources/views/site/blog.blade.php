@extends('layouts.site')

@section('title', __('site.blog.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.blog.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.blog.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-5">
            @foreach ($noticias as $noticia)
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">
                    <p class="text-xs text-gray-500 mb-1">{{ $noticia['data'] }} • {{ $noticia['categoria'] }}</p>
                    <h2 class="text-lg font-semibold text-gray-900 mb-2">{{ $noticia['titulo'] }}</h2>
                    <p class="text-sm text-gray-700 mb-2">{{ $noticia['resumo'] }}</p>
                    <p class="text-xs text-gray-500">
                        {{ __('site.blog.demo_note') }}
                    </p>
                </article>
            @endforeach
        </div>
        <aside class="space-y-4 text-sm">
            <div class="bg-red-50 border border-etecRed/30 rounded-xl p-5 shadow-sm">
                <h3 class="font-semibold text-etecRed mb-2">FEITEC</h3>
                <p class="text-gray-700">
                    {{ __('site.blog.feitec_text') }}
                </p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <h3 class="font-semibold text-gray-900 mb-2">{{ __('site.blog.calendar_title') }}</h3>
                <p class="text-gray-700 mb-1">{{ __('site.blog.calendar_text') }}</p>
                <a href="https://nsa.cps.sp.gov.br" target="_blank" class="text-etecRed font-semibold text-xs underline">
                    {{ __('site.blog.access_nsa') }}
                </a>
            </div>
        </aside>
    </section>
@endsection

