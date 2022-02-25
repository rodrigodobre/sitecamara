<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Indicaco
 * 
 * @property int $id
 * @property string $titulo_ind
 * @property string $texto_ind
 * @property \Carbon\Carbon $sessao
 * @property int $fk_vereador
 * 
 * @property \App\Models\Vereadore $vereadore
 *
 * @package App\Models
 */
class Indicaco extends Eloquent
{
	protected $table = 'indicacoes';
	public $timestamps = false;

	protected $casts = [
		'fk_vereador' => 'int'
	];

	protected $dates = [
		'sessao'
	];

	protected $fillable = [
		'titulo_ind',
		'texto_ind',
		'sessao',
		'fk_vereador'
	];

	public function vereador()
	{
		return $this->hasOne(Vereadore::class, 'id','fk_vereador');
	}
}
