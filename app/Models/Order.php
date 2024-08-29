<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        // Outros campos existentes
        'status', // Adiciona o campo status
    ];

    // Se você deseja adicionar algum comportamento específico para o status, como um método acessor ou mutador, você pode fazê-lo aqui.
}
