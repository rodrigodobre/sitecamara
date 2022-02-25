<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $nome
 * @property string $senha
 * @property int $tipo
 * @property int $permissao
 * @property string $login
 * 
 * @property \Illuminate\Database\Eloquent\Collection $certificados
 *
 * @package App\Models
 */
class Usuario extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'tipo' => 'int',
		'permissao' => 'int'
	];

	protected $fillable = [
		'nome',
		'senha',
		'tipo',
		'permissao',
		'login'
	];

	public function certificados()
	{
		return $this->hasMany(Certificado::class, 'fk_usuarios','id');
	}
}
