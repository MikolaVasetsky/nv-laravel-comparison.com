<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['type_id', 'category_id', 'name', 'details', 'image'];

	public function type()
	{
		return $this->belongsTo(Type::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
