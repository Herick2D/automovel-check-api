<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroUsuario extends Model
{
    use HasFactory;

    protected $table = 'registro_usuario';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'senha',
    ];
}
