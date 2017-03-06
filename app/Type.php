<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $fillable = ['name'];

	public function category()
	{
	   return $this->hasMany(Category::class);
	}

	protected static function boot() {
		parent::boot();

		static::deleting(function($category) {
			$category->category()->delete();
		});
	}
}
