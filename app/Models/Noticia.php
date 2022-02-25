<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 18:27:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Noticia
 * 
 * @property int $id
 * @property string $titulo
 * @property string $texto
 * @property string $credito
 * @property string $fotografo
 * @property \Carbon\Carbon $data_n
 * @property bool $publicado
 * @property int $tipo
 * @property int $fk_foto
 *
 * @package App\Models
 */
class Noticia extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'publicado' => 'bool',
		'tipo' => 'int',
		'fk_foto' => 'int'
	];

	protected $dates = [
		'data_n'
	];

	protected $fillable = [
		'titulo',
		'texto',
		'credito',
		'fotografo',
		'data_n',
		'publicado',
		'tipo',
		'fk_foto'
	];
    public function foto()
    {
        return $this->hasOne(Foto::class, 'id','fk_foto');
    }
}
