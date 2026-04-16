<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ETEC Zona Leste')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        etecRed: '#c62828',
                        etecRedDark: '#8e0000',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: radial-gradient(circle at top right, #fee2e2 0%, #f8fafc 28%, #f8fafc 100%);
        }
    </style>
</head>
<body class="text-gray-900 flex flex-col min-h-screen antialiased">
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-red-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('eteczl.png') }}" alt="Logo ETEC Zona Leste" class="w-8 h-8 object-contain rounded-sm">
                    <div>
                        <div class="font-extrabold text-lg text-etecRed leading-none">ETEC Zona Leste</div>
                        <div class="text-[10px] text-gray-500 uppercase tracking-[0.18em] mt-1">Centro Paula Souza</div>
                    </div>
                </div>

                <a href="#vestibulinho" class="hidden lg:inline-flex items-center bg-etecRed text-white text-xs font-semibold px-4 py-2 rounded-full shadow hover:bg-etecRedDark transition hover:-translate-y-0.5">
                    {{ __('site.cta.vestibulinho') }}
                </a>
            </div>

            <div class="hidden md:flex items-end justify-between gap-4 mt-3">
                <nav class="flex flex-wrap items-center gap-x-4 gap-y-2 text-[13px] font-semibold">
                    <a href="{{ route('site.home') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.home') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.home') }}</a>
                    <a href="{{ route('site.cursos') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.cursos') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.courses') }}</a>
                    <a href="{{ route('site.sobre') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.sobre') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.about') }}</a>
                    <a href="{{ route('site.blog') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.blog') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.news') }}</a>
                    <a href="{{ route('site.eventos') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.eventos') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.events') }}</a>
                    <a href="{{ route('site.oportunidades') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.oportunidades') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.jobs') }}</a>
                    <a href="{{ route('site.regimento') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.regimento') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.rules') }}</a>
                    <a href="{{ route('site.aluno') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.aluno') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.student') }}</a>
                    <a href="{{ route('site.contato') }}" class="px-2 py-1 rounded-md hover:bg-red-50 hover:text-etecRed {{ request()->routeIs('site.contato') ? 'text-etecRed bg-red-50' : '' }}">{{ __('site.nav.contact') }}</a>
                </nav>

                <div class="flex flex-col items-end gap-2">
                    <form method="GET" action="{{ route('site.busca') }}" class="flex items-center gap-2">
                        <input
                            type="text"
                            name="q"
                            value="{{ request('q') }}"
                            placeholder="{{ __('site.search.placeholder') }}"
                            class="w-48 border border-gray-200 rounded-md px-2.5 py-1.5 text-xs bg-white focus:outline-none focus:ring-2 focus:ring-red-200"
                        >
                        <button type="submit" class="text-xs bg-etecRed text-white px-2.5 py-1.5 rounded-md hover:bg-etecRedDark transition">
                            {{ __('site.search.button') }}
                        </button>
                    </form>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('site.lang', ['locale' => 'pt_BR']) }}" class="text-xs px-2 py-1 rounded-md border {{ app()->getLocale() === 'pt_BR' ? 'border-etecRed text-etecRed' : 'border-gray-200 text-gray-600 hover:border-etecRed' }}">PT</a>
                        <a href="{{ route('site.lang', ['locale' => 'en']) }}" class="text-xs px-2 py-1 rounded-md border {{ app()->getLocale() === 'en' ? 'border-etecRed text-etecRed' : 'border-gray-200 text-gray-600 hover:border-etecRed' }}">EN</a>
                        <a href="{{ route('site.lang', ['locale' => 'es']) }}" class="text-xs px-2 py-1 rounded-md border {{ app()->getLocale() === 'es' ? 'border-etecRed text-etecRed' : 'border-gray-200 text-gray-600 hover:border-etecRed' }}">ES</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-1 pb-10">
        @yield('content')
    </main>

    <footer class="bg-gradient-to-r from-etecRed to-etecRedDark text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8 text-sm">
            <div>
                <h4 class="font-bold mb-2 text-base">ETEC Zona Leste</h4>
                <p class="text-red-50">{{ __('site.footer.tagline') }}</p>
            </div>
            <div>
                <h4 class="font-bold mb-2 text-base">{{ __('site.footer.contact') }}</h4>
                <p class="text-red-50">{{ __('site.contact.full_address') }}</p>
                <p class="text-red-50 mt-1">{{ __('site.contact.phone_full') }}</p>
                <p class="text-red-50 mt-1">{{ __('site.contact.hours_full') }}</p>
                <p class="text-red-50 mt-1">E-mail: contato@eteczonaleste.sp.gov.br</p>
            </div>
            <div>
                <h4 class="font-bold mb-2 text-base">{{ __('site.footer.links') }}</h4>
                <ul class="space-y-1">
                    <li><a href="https://www.vestibulinhoetec.com.br" target="_blank" class="underline underline-offset-2 text-red-50 hover:text-white">Vestibulinho ETEC</a></li>
                    <li><a href="https://www.cps.sp.gov.br" target="_blank" class="underline underline-offset-2 text-red-50 hover:text-white">Centro Paula Souza</a></li>
                    <li><a href="https://nsa.cps.sp.gov.br" target="_blank" class="underline underline-offset-2 text-red-50 hover:text-white">NSA - Sistema Acadêmico</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-black/15 text-xs text-center py-3">
            &copy; {{ date('Y') }} {{ __('site.footer.disclaimer') }}
        </div>
    </footer>

    <script>
        // FAQ accordion simples
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-accordion-button]').forEach(button => {
                button.addEventListener('click', () => {
                    const target = document.getElementById(button.dataset.target);
                    if (!target) return;
                    const expanded = button.getAttribute('aria-expanded') === 'true';
                    button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
                    target.classList.toggle('hidden');
                });
            });
        });
    </script>
</body>
</html>

