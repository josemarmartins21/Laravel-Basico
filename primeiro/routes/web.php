<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teste;


// Rotas

Route::get('/', [Teste::class, 'index'])->name('home');

Route::get('/teste123', [Teste::class, 'formulario'])->name('formulario');

Route::get('/servicos', [Teste::class, 'servicos'])->name('servicos');

Route::post('/servicos/inserir', [Teste::class, 'store'])->name('inserir');

Route::get('/contactos/{nome}/{apelido?}', [Teste::class, 'contactos'])->name('contactos');

Route::get('/galeria/{pag}', [Teste::class, 'galeria'])->name('galeria');

