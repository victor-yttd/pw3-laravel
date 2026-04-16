@extends('layouts.site')

@section('title', __('site.about.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.about.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.about.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-12 grid md:grid-cols-3 gap-8 text-sm text-gray-700">
        <div class="md:col-span-2 space-y-4 bg-white rounded-xl shadow-sm border border-gray-100 p-6 leading-relaxed">
            <p class="text-gray-700">
                {{ __('site.about.p1') }}
            </p>
            <p class="text-gray-700">
                {{ __('site.about.p2') }}
            </p>
            <p class="text-gray-700">
                {{ __('site.about.p3') }}
            </p>
        </div>
        <aside class="space-y-4">
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <h2 class="font-semibold text-gray-900 mb-2">{{ __('site.about.mission_title') }}</h2>
                <p>{{ __('site.about.mission_text') }}</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <h2 class="font-semibold text-gray-900 mb-2">{{ __('site.about.vision_title') }}</h2>
                <p>{{ __('site.about.vision_text') }}</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                <h2 class="font-semibold text-gray-900 mb-2">{{ __('site.about.values_title') }}</h2>
                <ul class="list-disc list-inside space-y-1">
                    <li>{{ __('site.about.values.1') }}</li>
                    <li>{{ __('site.about.values.2') }}</li>
                    <li>{{ __('site.about.values.3') }}</li>
                </ul>
            </div>
        </aside>
    </section>
@endsection

