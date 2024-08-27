<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProdutoController;
use App\http\Controllers\CategoriaController;
use App\http\Controllers\EmpresaController;
use App\http\Controllers\ServicoController;
use App\http\Controllers\ClienteController;
use App\http\Controllers\OrdemServicoController;
use App\Models\OrdemServico;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/token', function () {
    return csrf_token();
});












