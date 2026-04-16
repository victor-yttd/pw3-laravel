@extends('layouts.site')

@section('title', __('site.courses_page.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.courses_page.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.courses_page.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10">
        <form method="GET" action="{{ route('site.cursos') }}" class="flex flex-wrap items-end gap-4 mb-7 bg-white border border-gray-100 rounded-xl shadow-sm p-4">
            <div class="flex-1 min-w-[240px]">
                <label class="block text-xs font-semibold text-gray-700 mb-1">{{ __('site.courses_page.search_label') }}</label>
                <input
                    type="text"
                    name="q"
                    value="{{ $pesquisa ?? '' }}"
                    placeholder="{{ __('site.courses_page.search_placeholder') }}"
                    class="w-full border border-gray-200 rounded-md text-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-200"
                >
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">{{ __('site.courses_page.period_label') }}</label>
                <select name="periodo" class="border border-gray-200 rounded-md text-sm px-3 py-2 min-w-[160px] focus:outline-none focus:ring-2 focus:ring-red-200">
                    <option value="">{{ __('site.common.all') }}</option>
                    <option value="{{ __('site.periods.morning') }}" {{ $periodoSelecionado === __('site.periods.morning') ? 'selected' : '' }}>{{ __('site.periods.morning') }}</option>
                    <option value="{{ __('site.periods.afternoon') }}" {{ $periodoSelecionado === __('site.periods.afternoon') ? 'selected' : '' }}>{{ __('site.periods.afternoon') }}</option>
                    <option value="{{ __('site.periods.night') }}" {{ $periodoSelecionado === __('site.periods.night') ? 'selected' : '' }}>{{ __('site.periods.night') }}</option>
                </select>
            </div>
            <button type="submit"
                    class="inline-flex items-center bg-etecRed text-white text-sm font-semibold px-4 py-2 rounded-md shadow hover:bg-etecRedDark transition">
                {{ __('site.courses_page.apply_filter') }}
            </button>
            @if($periodoSelecionado || ($pesquisa ?? '') !== '')
                <a href="{{ route('site.cursos') }}" class="text-xs text-gray-600 underline">{{ __('site.courses_page.clear_filter') }}</a>
            @endif
        </form>

        <div class="grid md:grid-cols-2 gap-6">
            @forelse ($cursos as $curso)
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md hover:-translate-y-0.5 transition">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">{{ $curso['nome'] }}</h2>
                    <span class="inline-block text-xs px-2 py-0.5 rounded-full bg-red-50 text-etecRed font-semibold mb-2">
                        {{ implode(', ', $curso['periodos'] ?? []) }} @if(!empty($curso['sigla'])) • {{ $curso['sigla'] }} @endif
                    </span>
                    <p class="text-sm text-gray-600 mb-3">{{ $curso['descricao'] }}</p>
                    <p class="text-xs text-gray-500">
                        {{ __('site.courses_page.duration') }} • {{ __('site.courses_page.mode') }}: {{ __('site.jobs.on_site') }}
                    </p>
                </article>
            @empty
                <p class="text-sm text-gray-600">
                    {{ __('site.courses_page.empty') }}
                </p>
            @endforelse
        </div>
    </section>
@endsection

