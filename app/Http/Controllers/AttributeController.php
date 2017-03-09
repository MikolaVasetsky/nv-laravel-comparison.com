<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;
use App\Type;

class AttributeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$attributes = Attribute::latest()->paginate(5);

		return view('admin.attribute.index', compact('attributes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if (request()->has('type_id')) {
			return view('admin.attribute.create');
		}
		return redirect()->route('admin');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store()
	{
		$this->validate(request(), [
			'type_id' => 'required|integer',
			'name' => 'required'
		]);

		Attribute::create(request()->all());

		return redirect()->route('attribute.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Attribute  $attribute
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$attributes = Attribute::where('type_id', $id)->latest()->paginate(5);
		return view('admin.attribute.index', compact('attributes'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Attribute  $attribute
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Attribute $attribute)
	{
		return view('admin.attribute.edit', compact('attribute'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Attribute  $attribute
	 * @return \Illuminate\Http\Response
	 */
	public function update(Attribute $attribute)
	{
		$this->validate(request(), [
			'name' => 'required'
		]);

		$attribute->update(request(['name']));

		return redirect()->route('attribute.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Attribute  $attribute
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Attribute $attribute)
	{
		$attribute->delete();

		return redirect()->route('attribute.index');
	}
}
