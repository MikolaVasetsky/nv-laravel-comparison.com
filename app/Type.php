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

	public function attribute()
	{
		return $this->hasMany(Attribute::class);
	}

	public function options()
	{
		return $this->hasMany(Options::class);
	}

	public function product()
	{
		return $this->hasMany(Product::class);
	}

	protected static function boot() {
		parent::boot();

		static::deleting(function($query) {
			$query->category()->delete();
			$query->attribute()->delete();
			$query->options()->delete();
			$query->product()->delete();
		});
	}
}
