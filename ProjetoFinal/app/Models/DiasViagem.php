<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiasViagem extends Model
{
    use HasFactory;

    // specify the table name
    protected $table = 'dias_viagem';

    // Defina os campos que podem ser preenchidos em massa (opcional)
    protected $fillable = [
        'user_id',
        'segunda',
        'terca',
        'quarta',
        'quinta',
        'sexta'
    ];


}
