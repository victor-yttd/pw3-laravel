<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $cursosDestaque = [
            ['nome' => __('site.courses.ds'), 'periodo' => __('site.periods.morning'), 'descricao' => __('site.course_descriptions.ds')],
            ['nome' => __('site.courses.logistics'), 'periodo' => __('site.periods.night'), 'descricao' => __('site.course_descriptions.logistics')],
            ['nome' => __('site.courses.admin'), 'periodo' => __('site.periods.morning'), 'descricao' => __('site.course_descriptions.admin')],
        ];

        $noticias = [
            [
                'titulo' => __('site.news_items.home_1.title'),
                'data' => '10/09/2026',
                'resumo' => __('site.news_items.home_1.summary'),
            ],
            [
                'titulo' => __('site.news_items.home_2.title'),
                'data' => '05/11/2026',
                'resumo' => __('site.news_items.home_2.summary'),
            ],
        ];

        $projetos = [
            [
                'nome' => 'Sentinelas Urbanas',
                'curso' => __('site.courses.ds'),
                'descricao' => __('site.projects.sentinelas'),
            ],
            [
                'nome' => 'EcoLog',
                'curso' => __('site.courses.logistics'),
                'descricao' => __('site.projects.ecolog'),
            ],
        ];

        return view('site.home', compact('cursosDestaque', 'noticias', 'projetos'));
    }

    public function cursos(Request $request)
    {
        $periodo = $request->query('periodo');
        $q = trim((string) $request->query('q', ''));

        $cursos = [
            ['nome' => __('site.courses.ds'), 'sigla' => 'DS', 'periodo' => __('site.periods.morning'), 'descricao' => __('site.course_descriptions.ds')],
            ['nome' => __('site.courses.ds'), 'sigla' => 'DS', 'periodo' => __('site.periods.afternoon'), 'descricao' => __('site.course_descriptions.ds')],
            ['nome' => __('site.courses.ds'), 'sigla' => 'DS', 'periodo' => __('site.periods.night'), 'descricao' => __('site.course_descriptions.ds')],

            ['nome' => __('site.courses.admin'), 'sigla' => 'ADM', 'periodo' => __('site.periods.morning'), 'descricao' => __('site.course_descriptions.admin')],
            ['nome' => __('site.courses.admin'), 'sigla' => 'ADM', 'periodo' => __('site.periods.night'), 'descricao' => __('site.course_descriptions.admin')],

            ['nome' => __('site.courses.hr'), 'sigla' => 'RH', 'periodo' => __('site.periods.morning'), 'descricao' => __('site.course_descriptions.hr')],

            ['nome' => __('site.courses.logistics'), 'sigla' => 'LOG', 'periodo' => __('site.periods.afternoon'), 'descricao' => __('site.course_descriptions.logistics')],
            ['nome' => __('site.courses.logistics'), 'sigla' => 'LOG', 'periodo' => __('site.periods.night'), 'descricao' => __('site.course_descriptions.logistics')],

            ['nome' => __('site.courses.legal_services'), 'sigla' => 'SJ', 'periodo' => __('site.periods.night'), 'descricao' => __('site.course_descriptions.legal_services')],

            ['nome' => __('site.courses.accounting'), 'sigla' => 'CONT', 'periodo' => __('site.periods.morning'), 'descricao' => __('site.course_descriptions.accounting')],
        ];

        $colecao = collect($cursos)
            ->when($periodo, function ($collection) use ($periodo) {
                return $collection->filter(function ($curso) use ($periodo) {
                    return strtolower($curso['periodo']) === strtolower($periodo);
                });
            })
            ->when($q !== '', function ($collection) use ($q) {
                $needle = mb_strtolower($q);
                return $collection->filter(function ($curso) use ($needle) {
                    $haystack = mb_strtolower(
                        ($curso['nome'] ?? '')
                        .' '.($curso['sigla'] ?? '')
                        .' '.($curso['descricao'] ?? '')
                    );
                    return str_contains($haystack, $needle);
                });
            })
            ->values();

        $cursosAgrupados = $colecao
            ->groupBy('sigla')
            ->map(function ($items) {
                $first = $items->first();

                return [
                    'nome' => $first['nome'],
                    'sigla' => $first['sigla'],
                    'descricao' => $first['descricao'],
                    'periodos' => $items->pluck('periodo')->unique()->values()->all(),
                ];
            })
            ->values()
            ->all();

        return view('site.cursos', [
            'cursos' => $cursosAgrupados,
            'periodoSelecionado' => $periodo,
            'pesquisa' => $q,
        ]);
    }

    public function sobre()
    {
        return view('site.sobre');
    }

    public function blog()
    {
        $noticias = [
            [
                'titulo' => __('site.news_items.blog_1.title'),
                'data' => '10/09/2026',
                'categoria' => __('site.categories.events'),
                'resumo' => __('site.news_items.blog_1.summary'),
            ],
            [
                'titulo' => __('site.news_items.blog_2.title'),
                'data' => '20/02/2026',
                'categoria' => __('site.categories.school_life'),
                'resumo' => __('site.news_items.blog_2.summary'),
            ],
            [
                'titulo' => __('site.news_items.blog_3.title'),
                'data' => '15/08/2026',
                'categoria' => __('site.categories.partnerships'),
                'resumo' => __('site.news_items.blog_3.summary'),
            ],
        ];

        return view('site.blog', compact('noticias'));
    }

    public function aluno()
    {
        $linksAluno = [
            [
                'nome' => __('site.student.links.nsa'),
                'url' => 'https://nsa.cps.sp.gov.br',
                'descricao' => __('site.student.links.nsa_desc'),
            ],
            [
                'nome' => __('site.student.links.secretary'),
                'url' => '#',
                'descricao' => __('site.student.links.secretary_desc'),
            ],
            [
                'nome' => __('site.student.links.library'),
                'url' => '#',
                'descricao' => __('site.student.links.library_desc'),
            ],
        ];

        return view('site.aluno', compact('linksAluno'));
    }

    public function contato()
    {
        return view('site.contato');
    }

    public function busca(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $paginas = collect([
            [
                'titulo' => __('site.nav.home'),
                'descricao' => __('site.home.hero_text'),
                'url' => route('site.home'),
                'keywords' => [__('site.nav.home'), 'etec', 'zona leste', 'vestibulinho'],
            ],
            [
                'titulo' => __('site.nav.courses'),
                'descricao' => __('site.courses_page.subtitle'),
                'url' => route('site.cursos'),
                'keywords' => [__('site.courses.ds'), __('site.courses.admin'), __('site.courses.hr'), __('site.courses.logistics')],
            ],
            [
                'titulo' => __('site.nav.news'),
                'descricao' => __('site.blog.subtitle'),
                'url' => route('site.blog'),
                'keywords' => [__('site.nav.news'), 'feitec', __('site.categories.events')],
            ],
            [
                'titulo' => __('site.nav.events'),
                'descricao' => __('site.events_page.subtitle'),
                'url' => route('site.eventos'),
                'keywords' => [__('site.nav.events'), 'calendario', 'agenda', 'datas'],
            ],
            [
                'titulo' => __('site.nav.rules'),
                'descricao' => __('site.rules.subtitle'),
                'url' => route('site.regimento'),
                'keywords' => [__('site.nav.rules'), 'regimento', 'normas'],
            ],
            [
                'titulo' => __('site.nav.jobs'),
                'descricao' => __('site.jobs.subtitle'),
                'url' => route('site.oportunidades'),
                'keywords' => [__('site.nav.jobs'), 'vagas', 'estagio', 'emprego'],
            ],
            [
                'titulo' => __('site.nav.contact'),
                'descricao' => __('site.contact.subtitle'),
                'url' => route('site.contato'),
                'keywords' => [__('site.nav.contact'), 'telefone', 'endereco', 'horario'],
            ],
            [
                'titulo' => __('site.nav.student'),
                'descricao' => __('site.student.subtitle'),
                'url' => route('site.aluno'),
                'keywords' => [__('site.nav.student'), 'nsa', 'aluno', 'boletim'],
            ],
        ]);

        $resultados = $paginas
            ->when($q !== '', function ($collection) use ($q) {
                $needle = mb_strtolower($q);
                return $collection->filter(function ($item) use ($needle) {
                    $haystack = mb_strtolower(
                        ($item['titulo'] ?? '')
                        .' '.($item['descricao'] ?? '')
                        .' '.implode(' ', $item['keywords'] ?? [])
                    );
                    return str_contains($haystack, $needle);
                });
            })
            ->values()
            ->all();

        return view('site.busca', [
            'q' => $q,
            'resultados' => $resultados,
        ]);
    }

    public function eventos()
    {
        $eventos = [
            [
                'data' => Carbon::create(2026, 9, 10),
                'titulo' => 'FEITEC 2026',
                'descricao' => __('site.events_page.items.feitec'),
            ],
            [
                'data' => Carbon::create(2026, 11, 5),
                'titulo' => __('site.events_page.items.entrance_title'),
                'descricao' => __('site.events_page.items.entrance_desc'),
            ],
            [
                'data' => Carbon::create(2026, 12, 2),
                'titulo' => __('site.events_page.items.parents_title'),
                'descricao' => __('site.events_page.items.parents_desc'),
            ],
        ];

        $mesRef = Carbon::now()->startOfMonth();
        $diasNoMes = $mesRef->daysInMonth;
        $primeiroDiaSemana = (int) $mesRef->dayOfWeekIso; // 1..7 (Seg..Dom)

        $eventosPorDia = collect($eventos)
            ->filter(fn ($e) => $e['data'] instanceof Carbon)
            ->groupBy(fn ($e) => $e['data']->toDateString())
            ->toArray();

        return view('site.eventos', compact('eventos', 'mesRef', 'diasNoMes', 'primeiroDiaSemana', 'eventosPorDia'));
    }

    public function regimento()
    {
        $itens = [
            __('site.rules.items.1'),
            __('site.rules.items.2'),
            __('site.rules.items.3'),
            __('site.rules.items.4'),
            __('site.rules.items.5'),
        ];

        return view('site.regimento', compact('itens'));
    }

    public function oportunidades()
    {
        $vagas = [
            [
                'titulo' => __('site.jobs.items.1.title'),
                'area' => __('site.courses.ds'),
                'modelo' => __('site.jobs.on_site'),
                'local' => __('site.jobs.locations.zl'),
            ],
            [
                'titulo' => __('site.jobs.items.2.title'),
                'area' => __('site.courses.admin'),
                'modelo' => __('site.jobs.hybrid'),
                'local' => __('site.jobs.locations.sp'),
            ],
            [
                'titulo' => __('site.jobs.items.3.title'),
                'area' => __('site.courses.logistics'),
                'modelo' => __('site.jobs.on_site'),
                'local' => __('site.jobs.locations.zl'),
            ],
        ];

        return view('site.oportunidades', compact('vagas'));
    }

    public function enviarContato(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'assunto' => ['required', 'string', 'max:255'],
            'mensagem' => ['required', 'string', 'min:10'],
        ]);

        // Aqui poderíamos enviar e-mail ou salvar em banco.
        // Para fins institucionais, apenas simulamos o envio.

        return back()->with('status', __('site.contact.success'));
    }
}

