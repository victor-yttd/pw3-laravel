@extends('layouts.site')

@section('title', __('site.student.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.student.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.student.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2 space-y-5">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-2">{{ __('site.student.dashboard_title') }}</h2>
                <p class="text-sm text-gray-700 mb-4">
                    {{ __('site.student.dashboard_text') }}
                </p>
                <div class="grid sm:grid-cols-3 gap-4 text-sm">
                    @foreach ($linksAluno as $link)
                        <a href="{{ $link['url'] }}" target="{{ $link['url'] === '#' ? '_self' : '_blank' }}"
                           class="border border-gray-200 rounded-xl p-4 hover:border-etecRed hover:shadow-sm transition block">
                            <h3 class="font-semibold text-gray-900 mb-1">{{ $link['nome'] }}</h3>
                            <p class="text-xs text-gray-600">{{ $link['descricao'] }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <aside class="space-y-4 text-sm">
            <div class="bg-red-50 border border-etecRed/30 rounded-xl p-5 shadow-sm">
                <h3 class="font-semibold text-etecRed mb-1">{{ __('site.student.quick_nsa_title') }}</h3>
                <p class="text-gray-700 mb-2">{{ __('site.student.quick_nsa_text') }}</p>
                <a href="https://nsa.cps.sp.gov.br" target="_blank"
                   class="inline-flex items-center bg-etecRed text-white text-xs font-semibold px-3 py-1.5 rounded-full hover:bg-etecRedDark transition">
                    {{ __('site.student.go_nsa') }}
                </a>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <h3 class="font-semibold text-gray-900 mb-1">{{ __('site.student.service_title') }}</h3>
                <p class="text-gray-700 text-xs">
                    {{ __('site.student.service_text') }}
                </p>
            </div>
        </aside>
    </section>
@endsection

