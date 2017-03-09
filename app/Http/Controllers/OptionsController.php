<?php

namespace App\Http\Controllers;

use App\Options;
use App\Type;
use App\Attribute;

class OptionsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$options = Options::latest()->paginate(5);

		return view('admin.options.index', compact('options'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if (request()->has('type_id')) {
			$attributes = Attribute::where('type_id', request()->type_id)->pluck('name', 'id');
			return view('admin.options.create', compact('attributes'));
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
			'attribute_id' => 'required|integer',
			'type_field' => 'required',
			'name' => 'required'
		]);

		Options::create(request()->all());

		return redirect()->route('options.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Options  $options
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$options = Options::where('type_id', $id)->latest()->paginate(5);

		return view('admin.options.index', compact('options'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Options  $options
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Options $option)
	{
		return view('admin.options.edit', compact('option'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Options  $options
	 * @return \Illuminate\Http\Response
	 */
	public function update(Options $option)
	{
		$this->validate(request(), [
			'type_field' => 'required',
			'name' => 'required'
		]);

		$option->update(request(['name', 'type_field']));

		return redirect()->route('options.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Options  $options
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Options $option)
	{
		$option->delete();

		return redirect()->route('options.index');
	}
}
