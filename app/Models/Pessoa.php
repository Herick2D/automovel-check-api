<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';
    protected $primaryKey = 'idPessoa';
    protected $fillable = [
        'nome',
        'idade',
        'sexo',
    ];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class, 'idPessoa');
    }
}
