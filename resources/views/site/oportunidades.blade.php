@extends('layouts.site')

@section('title', __('site.jobs.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.jobs.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.jobs.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8 text-sm">
        <div class="md:col-span-2 space-y-4">
            @foreach ($vagas as $vaga)
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">{{ $vaga['titulo'] }}</h2>
                    <p class="text-xs text-gray-500 mb-3">
                        {{ __('site.jobs.area') }}: {{ $vaga['area'] }} • {{ __('site.jobs.model') }}: {{ $vaga['modelo'] }} • {{ __('site.jobs.location') }}: {{ $vaga['local'] }}
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <a href="#" class="inline-flex items-center bg-etecRed text-white text-xs font-semibold px-3 py-1.5 rounded-full hover:bg-etecRedDark transition">
                            {{ __('site.jobs.apply') }}
                        </a>
                        <a href="#" class="inline-flex items-center border border-gray-300 text-gray-700 text-xs font-semibold px-3 py-1.5 rounded-full hover:border-etecRed hover:text-etecRed transition">
                            {{ __('site.jobs.details') }}
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <aside class="space-y-4">
            <div class="bg-red-50 border border-etecRed/30 rounded-xl p-5 shadow-sm">
                <h3 class="font-semibold text-etecRed mb-2">{{ __('site.jobs.tip_title') }}</h3>
                <p class="text-xs text-gray-700">
                    {{ __('site.jobs.tip_text') }}
                </p>
            </div>
        </aside>
    </section>
@endsection

