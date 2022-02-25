<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Foto
 * 
 * @property int $id
 * @property string $foto_src
 * @property int $tipo
 * @property string $nome
 * @property int $fk_galeria
 * 
 * @property \Illuminate\Database\Eloquent\Collection $vereadores
 *
 * @package App\Models
 */
class Foto extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'tipo' => 'int',
		'fk_galeria' => 'int'
	];

	protected $fillable = [
		'foto_src',
		'tipo',
		'nome',
		'fk_galeria'
	];

	public function vereadores()
	{
		return $this->belongsTo(Vereadore::class, 'fk_foto','id');
	}
    public function noticias()
    {
        return $this->belongsTo(Noticia::class, 'fk_foto','id');
    }
}
