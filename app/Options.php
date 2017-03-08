<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
	protected $fillable = ['type_id', 'attribute_id', 'name', 'type_field'];

	public function type()
	{
		return $this->belongsTo(Type::class);
	}

	public function attribute()
	{
		return $this->belongsTo(Attribute::class);
	}
}
