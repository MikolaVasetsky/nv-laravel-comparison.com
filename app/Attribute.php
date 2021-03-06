<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
	protected $fillable = ['type_id', 'name'];

	public function type()
	{
		return $this->belongsTo(Type::class);
	}
}
