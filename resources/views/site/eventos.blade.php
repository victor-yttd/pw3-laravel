@extends('layouts.site')

@section('title', __('site.events_page.meta_title'))

@section('content')
    <section class="bg-white/90 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-etecRed mb-2">{{ __('site.events_page.title') }}</h1>
            <p class="text-sm text-gray-600 max-w-3xl">
                {{ __('site.events_page.subtitle') }}
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
        <div class="md:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-semibold text-gray-900">
                        {{ $mesRef->translatedFormat('F \\d\\e Y') }}
                    </h2>
                    <span class="text-xs text-gray-500">{{ __('site.events_page.weekdays') }}</span>
                </div>

                <div class="grid grid-cols-7 gap-2 text-xs">
                    @for ($i = 1; $i < $primeiroDiaSemana; $i++)
                        <div class="h-10"></div>
                    @endfor

                    @for ($dia = 1; $dia <= $diasNoMes; $dia++)
                        @php
                            $data = $mesRef->copy()->day($dia)->toDateString();
                            $temEvento = array_key_exists($data, $eventosPorDia);
                        @endphp
                        <div class="h-10 rounded-md border {{ $temEvento ? 'border-etecRed bg-red-50' : 'border-gray-200 bg-gray-50' }} flex items-start justify-between px-2 py-1">
                            <span class="{{ $temEvento ? 'text-etecRed font-bold' : 'text-gray-700 font-semibold' }}">{{ $dia }}</span>
                            @if ($temEvento)
                                <span class="text-[10px] text-etecRed font-semibold">•</span>
                            @endif
                        </div>
                    @endfor
                </div>

                <p class="text-xs text-gray-500 mt-4">
                    {{ __('site.events_page.legend') }}
                </p>
            </div>
        </div>

        <aside class="space-y-4">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h2 class="font-semibold text-gray-900 mb-3">{{ __('site.events_page.next_events') }}</h2>
                <div class="space-y-3">
                    @foreach ($eventos as $evento)
                        <div class="border border-gray-200 rounded-lg p-3">
                            <p class="text-xs text-gray-500 mb-1">{{ $evento['data']->format('d/m/Y') }}</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $evento['titulo'] }}</p>
                            <p class="text-xs text-gray-600">{{ $evento['descricao'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </aside>
    </section>
@endsection

