<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Resenh
 *
 * @property int $id
 * @property \Carbon\Carbon $data_sessao
 * @property int $tipo_de_sessao
 * @property string $pdf_vinculado
 * @property int $numero_sessao
 * @property string descritivo
 *
 * @package App\Models
 */
class Resenha extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
        'numero_sessao' => 'int',
        'tipo_de_sessao' => 'int'
    ];

    protected $dates = [
        'data_sessao'
    ];

    protected $fillable = [
        'data_sessao',
        'numero_sessao',
        'tipo_de_sessao',
        'pdf_vinculado',
        'descritivo'
    ];
}
