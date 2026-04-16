@extends('layouts.site')

@section('title', __('site.home.meta_title'))

@section('content')
    <section class="bg-gradient-to-br from-etecRed via-etecRed to-etecRedDark text-white shadow-xl">
        <div class="max-w-7xl mx-auto px-4 py-14 md:py-20 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <p class="text-xs uppercase tracking-[0.25em] text-red-100 mb-2">{{ __('site.home.eyebrow') }}</p>
                <h1 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight">
                    ETEC Zona Leste<br>
                    <span class="text-red-100 text-2xl md:text-3xl">{{ __('site.home.hero_title') }}</span>
                </h1>
                <p class="text-red-100 mb-6">
                    {{ __('site.home.hero_text') }}
                </p>
                <div class="flex flex-wrap gap-3">
                    <a id="vestibulinho" href="https://www.vestibulinhoetec.com.br" target="_blank"
                       class="inline-flex items-center bg-white text-etecRed font-semibold px-5 py-2 rounded-full shadow hover:bg-red-50 transition text-sm">
                        {{ __('site.home.cta_apply') }}
                    </a>
                    <a href="{{ route('site.cursos') }}"
                       class="inline-flex items-center border border-red-100 text-white font-medium px-5 py-2 rounded-full hover:bg-white/10 transition text-sm">
                        {{ __('site.home.cta_courses') }}
                    </a>
                    <a href="{{ route('site.eventos') }}"
                       class="inline-flex items-center border border-red-100 text-white font-medium px-5 py-2 rounded-full hover:bg-white/10 transition text-sm">
                        {{ __('site.home.cta_events') }}
                    </a>
                </div>
            </div>
            <div class="bg-white/10 border border-red-200/40 rounded-2xl p-6 md:p-7 backdrop-blur shadow-lg">
                <h2 class="font-semibold text-lg mb-4 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">★</span>
                    {{ __('site.home.highlights_title') }}
                </h2>
                <ul class="space-y-3 text-sm text-red-50">
                    <li>• {{ __('site.home.highlights.1') }}</li>
                    <li>• {{ __('site.home.highlights.2') }}</li>
                    <li>• {{ __('site.home.highlights.3') }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-14 grid md:grid-cols-3 gap-7">
        <div class="md:col-span-2">
            <h2 class="text-xl font-bold text-etecRed mb-4">{{ __('site.home.featured_courses') }}</h2>
            <div class="grid md:grid-cols-3 gap-4">
                @foreach ($cursosDestaque as $curso)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md hover:-translate-y-0.5 transition">
                        <h3 class="font-semibold text-gray-900 mb-1">{{ $curso['nome'] }}</h3>
                        <span class="inline-block text-xs px-2 py-0.5 rounded-full bg-red-50 text-etecRed font-semibold mb-2">
                            {{ $curso['periodo'] }}
                        </span>
                        <p class="text-xs text-gray-600">{{ $curso['descricao'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                <h2 class="text-xl font-bold text-etecRed mb-4">{{ __('site.home.projects_title') }}</h2>
                <div class="grid md:grid-cols-2 gap-4">
                    @foreach ($projetos as $projeto)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md hover:-translate-y-0.5 transition">
                            <h3 class="font-semibold text-gray-900 mb-1">{{ $projeto['nome'] }}</h3>
                            <p class="text-xs text-gray-500 mb-2">{{ __('site.home.course_label') }} {{ $projeto['curso'] }}</p>
                            <p class="text-xs text-gray-600">{{ $projeto['descricao'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <aside>
            <h2 class="text-xl font-bold text-etecRed mb-4">{{ __('site.home.news_title') }}</h2>
            <div class="space-y-4">
                @foreach ($noticias as $noticia)
                    <article class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">
                        <p class="text-xs text-gray-500 mb-1">{{ $noticia['data'] }}</p>
                        <h3 class="font-semibold text-gray-900 mb-1">{{ $noticia['titulo'] }}</h3>
                        <p class="text-xs text-gray-600 mb-2">{{ $noticia['resumo'] }}</p>
                        <a href="{{ route('site.blog') }}" class="text-xs font-semibold text-etecRed hover:underline">{{ __('site.common.see_more') }}</a>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                <h3 class="text-sm font-bold text-gray-900 mb-3">{{ __('site.home.faq_title') }}</h3>
                <div class="space-y-3 text-sm">
                    <button
                        type="button"
                        class="w-full flex justify-between items-center bg-white border border-gray-200 rounded-md px-3 py-2 text-left text-sm font-medium"
                        data-accordion-button
                        data-target="faq1"
                        aria-expanded="false">
                        <span>{{ __('site.home.faq.q1') }}</span>
                        <span class="text-xs text-gray-500">+</span>
                    </button>
                    <div id="faq1" class="hidden bg-gray-50 border border-t-0 border-gray-200 rounded-b-md px-3 py-2 text-xs text-gray-700">
                        {{ __('site.home.faq.a1') }}
                        <a href="https://www.vestibulinhoetec.com.br" target="_blank" class="underline text-etecRed">vestibulinhoetec.com.br</a>.
                    </div>

                    <button
                        type="button"
                        class="w-full flex justify-between items-center bg-white border border-gray-200 rounded-md px-3 py-2 text-left text-sm font-medium"
                        data-accordion-button
                        data-target="faq2"
                        aria-expanded="false">
                        <span>{{ __('site.home.faq.q2') }}</span>
                        <span class="text-xs text-gray-500">+</span>
                    </button>
                    <div id="faq2" class="hidden bg-gray-50 border border-t-0 border-gray-200 rounded-b-md px-3 py-2 text-xs text-gray-700">
                        {{ __('site.home.faq.a2') }}
                    </div>

                    <button
                        type="button"
                        class="w-full flex justify-between items-center bg-white border border-gray-200 rounded-md px-3 py-2 text-left text-sm font-medium"
                        data-accordion-button
                        data-target="faq3"
                        aria-expanded="false">
                        <span>{{ __('site.home.faq.q3') }}</span>
                        <span class="text-xs text-gray-500">+</span>
                    </button>
                    <div id="faq3" class="hidden bg-gray-50 border border-t-0 border-gray-200 rounded-b-md px-3 py-2 text-xs text-gray-700">
                        {{ __('site.home.faq.a3') }}
                    </div>
                </div>
            </div>
        </aside>
    </section>
@endsection

