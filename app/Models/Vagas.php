<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
    protected $table = 'vagas';

    protected $fillable =
    [
        'data_post',
        'titulo_vaga',
        'area_profissao',
        'numero_vagas',
        'local_trabalho',
        'para_premium',
        'oport_para',
        'salario',
        'beneficios',
        'horario_trab',
        'atividades',
        'pre_requisitos',
        'exigencias',
        'n_candidaturas',
        'expira_em',
    ];
}
