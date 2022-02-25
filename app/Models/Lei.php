<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Lei
 * 
 * @property int $id
 * @property string $palavra_chave
 * @property \Carbon\Carbon $data_sancao
 * @property \Carbon\Carbon $data_publicacao
 * @property int $numero
 * @property string $ementa
 * @property string $autor
 * @property int $tipo
 * @property int $status
 * @property string $lei_source
 *
 * @package App\Models
 */
class Lei extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'tipo' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'data_sancao',
		'data_publicacao'
	];

	protected $fillable = [
		'palavra_chave',
		'data_sancao',
		'data_publicacao',
		'numero',
		'ementa',
		'tipo',
		'status',
		'lei_source'
	];
        
        public function autor()
        {
            return $this->hasMany(Autor::class, 'fk_lei','id');
        }
}
