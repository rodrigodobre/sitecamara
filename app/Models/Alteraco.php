<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Alteraco
 * 
 * @property int $fk_usuario
 * @property int $tabela
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $operacao
 * @property int $idtabelaalterada
 * @property int $id
 *
 * @package App\Models
 */
class Alteraco extends Eloquent
{
	protected $table = 'Alteracoes';

	protected $casts = [
		'fk_usuario' => 'int',
		'tabela' => 'int',
		'operacao' => 'int',
		'idtabelaalterada' => 'int'
	];

	protected $fillable = [
		'fk_usuario',
		'tabela',
		'operacao',
		'idtabelaalterada'
	];
}
