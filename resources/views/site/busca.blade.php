@extends('layouts.site')

@section('title', __('site.search.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.search.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.search.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10">
        <form method="GET" action="{{ route('site.busca') }}" class="flex gap-2 mb-6 bg-white border border-gray-100 rounded-xl shadow-sm p-4">
            <input
                type="text"
                name="q"
                value="{{ $q }}"
                placeholder="{{ __('site.search.placeholder') }}"
                class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-200"
            >
            <button type="submit" class="bg-etecRed text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-etecRedDark transition">
                {{ __('site.search.button') }}
            </button>
        </form>

        @if ($q === '')
            <p class="text-sm text-gray-600">{{ __('site.search.type_term') }}</p>
        @elseif (count($resultados) === 0)
            <p class="text-sm text-gray-600">{{ __('site.search.no_results') }}</p>
        @else
            <div class="space-y-3">
                @foreach ($resultados as $item)
                    <a href="{{ $item['url'] }}" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-etecRed hover:shadow-sm transition">
                        <h2 class="text-base font-semibold text-gray-900 mb-1">{{ $item['titulo'] }}</h2>
                        <p class="text-sm text-gray-600">{{ $item['descricao'] }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </section>
@endsection

