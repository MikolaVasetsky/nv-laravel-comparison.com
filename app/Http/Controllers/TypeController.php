<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$types = Type::all();
		return view('admin.type.index', compact('types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.type.create');
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
			'name' => 'required|unique:types'
		]);

		Type::create(request()->all());

		return redirect()->route('type.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Type  $type
	 * @return \Illuminate\Http\Response
	 */
	public function show(Type $type)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Type  $type
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Type $type)
	{
		return view('admin.type.edit', compact('type'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Type  $type
	 * @return \Illuminate\Http\Response
	 */
	public function update(Type $type)
	{
		$type->update(request()->all());

		return redirect()->route('type.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Type  $type
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Type $type)
	{
		$type->delete();

		return redirect()->route('type.index');
	}
}
