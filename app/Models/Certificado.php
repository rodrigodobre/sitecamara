<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Certificado
 * 
 * @property int $id
 * @property string $nome_certificado
 * @property string $img_certificado
 * @property \Carbon\Carbon $data_certificado
 * @property string $texto_certificado
 * @property int $fk_usuarios
 * 
 * @property \App\Models\Usuario $usuario
 *
 * @package App\Models
 */
class Certificado extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'fk_usuarios' => 'int'
	];

	protected $dates = [
		'data_certificado'
	];

	protected $fillable = [
		'nome_certificado',
		'img_certificado',
		'data_certificado',
		'texto_certificado',
		'fk_usuarios'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class,'id', 'fk_usuarios');
	}
}
