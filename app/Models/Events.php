<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['descricao', 'evento', 'data', 'horario', 'local', 'status'];
}
