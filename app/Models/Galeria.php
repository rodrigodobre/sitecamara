<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Galeria
 * 
 * @property int $id
 * @property \Carbon\Carbon $data_g
 * @property string $nome
 * @property int $categoria
 * @property string $descricao
 * @property string $fotografo
 *
 * @package App\Models
 */
class Galeria extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'categoria' => 'int'
	];

	protected $dates = [
		'data_g'
	];

	protected $fillable = [
		'data_g',
		'nome',
		'categoria',
		'descricao',
		'fotografo'
	];
}
