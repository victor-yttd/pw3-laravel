<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['pt_BR', 'en', 'es'], true)) {
        abort(404);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('site.lang');

Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/cursos', [SiteController::class, 'cursos'])->name('site.cursos');
Route::get('/sobre', [SiteController::class, 'sobre'])->name('site.sobre');
Route::get('/blog', [SiteController::class, 'blog'])->name('site.blog');
Route::get('/aluno', [SiteController::class, 'aluno'])->name('site.aluno');
Route::get('/eventos', [SiteController::class, 'eventos'])->name('site.eventos');
Route::get('/regimento', [SiteController::class, 'regimento'])->name('site.regimento');
Route::get('/oportunidades', [SiteController::class, 'oportunidades'])->name('site.oportunidades');
Route::get('/busca', [SiteController::class, 'busca'])->name('site.busca');

Route::get('/contato', [SiteController::class, 'contato'])->name('site.contato');
Route::post('/contato', [SiteController::class, 'enviarContato'])->name('site.contato.enviar');

