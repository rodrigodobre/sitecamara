<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 19 Aug 2020 10:31:45 -0400.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Autor
 * 
 * @property int $id
 * @property string $nome_autor
 * @property int $fk_lei
 *
 * @package App\Models
 */
class Autor extends Eloquent
{
	protected $table = 'autor';
	public $timestamps = false;

	protected $casts = [
		'fk_lei' => 'int'
	];

	protected $fillable = [
		'nome_autor',
		'fk_lei'
	];
        
        public function autor()
        {
            return $this->belongsTo(Lei::class, 'id','fk_lei');
        }
}
