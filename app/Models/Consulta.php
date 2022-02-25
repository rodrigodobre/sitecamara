<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 10 Jun 2021 7:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Consulta
 * 
 * @property int $id
 * @property string $bairro
 * @property string $sugestao
 *
 * @package App\Models
 */
class Consulta extends Eloquent
{

	protected $fillable = [
		'bairro',
                'sugestao'
	];

}
