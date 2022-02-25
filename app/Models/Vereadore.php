<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Vereadore
 * 
 * @property int $id
 * @property string $nome
 * @property string $nome_parlamentar
 * @property string $partido
 * @property string $telefone
 * @property string $email
 * @property string $naturalidade
 * @property string $data_nasc
 * @property string $profissao
 * @property int $mesa_diretora
 * @property bool $ativo
 * @property int $fk_foto
 * 
 * @property \App\Models\Foto $foto
 * @property \Illuminate\Database\Eloquent\Collection $indicacos
 *
 * @package App\Models
 */
class Vereadore extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'mesa_diretora' => 'int',
		'ativo' => 'bool',
		'fk_foto' => 'int'
	];

	protected $fillable = [
		'nome',
		'nome_parlamentar',
		'partido',
		'telefone',
		'email',
		'naturalidade',
		'data_nasc',
		'profissao',
		'mesa_diretora',
		'ativo',
		'fk_foto'
	];

	public function foto()
	{
		return $this->hasOne(Foto::class, 'id', 'fk_foto');
	}

	public function indicacao()
	{
		return $this->hasMany(Indicaco::class, 'fk_vereador','id');
	}
}
