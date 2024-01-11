<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{
    use HasFactory;

    protected $table = 'revisoes';
    protected $primaryKey = 'idRevisao';
    protected $fillable = [
        'custo',
        'descricao',
        'data_agendamento',
        'idVeiculo',
        'idPessoa',
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'idVeiculo', 'idVeiculo');
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa', 'idPessoa');
    }
}
