<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Type;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// $categories = Category::latest()->paginate(5);

		$categories = Category::latest()
					->join('types', 'categories.type_id', '=', 'types.id')
					->select('categories.*', 'types.name as category_name')
					->paginate(5);
		// dd($categories);

		return view('admin.category.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if (request()->has('type_id')) {
			return view('admin.category.create');
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

		Category::create(request()->all());

		return redirect()->route('category.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$categories = Category::where('type_id', $id)->latest()->paginate(5);
		return view('admin.category.index', compact('categories'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category)
	{
		return view('admin.category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(Category $category)
	{
		$this->validate(request(), [
			'name' => 'required'
		]);

		$category->update(request(['name']));

		return redirect()->route('category.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category)
	{
		$category->delete();

		return redirect()->route('category.index');
	}
}
