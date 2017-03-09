<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Type;
use App\Category;
use App\Attribute;
use App\Options;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = Product::latest()->paginate(5);

		return view('admin.product.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if (request()->has('type_id')) {
			$typeId = request()->type_id;
			$categories = Category::where('type_id', $typeId)->pluck('name', 'id');

			$fields = Options::where('type_id', $typeId)->select('id', 'name', 'type_field')->get();

			return view('admin.product.create', compact('categories', 'attributes', 'fields'));
		}
		return redirect()->route('admin');
	}

	/**
	 * create product \ save image \ validation
	 * @return [type] [description]
	 */
	public function store()
	{
		$this->validate(request(), [
			'type_id' => 'required|integer',
			'category_id' => 'required|integer',
			'name' => 'required',
			'image' => 'image|mimes:png,jpg,jpeg|max:10000'
		]);

		$createArray = [
			'type_id' => request('type_id'),
			'category_id' => request('category_id'),
			'name' => request('name'),
		];

		// image upload
		$image = request()->image;
		if ( $image ) {
			$imageName = $image->getClientSize() . $image->getClientOriginalName();
			$image->move('images', $imageName);
			$createArray['image'] = $imageName;
		}

		$ignoreArray = ['_token', 'type_id', 'category_id', 'name', 'image'];

		foreach(request()->all() as $key => $value) {
			if ( !in_array($key, $ignoreArray) ) {
				$detailsArray[$key] = $value;
			}
		}

		$createArray['details'] = json_encode($detailsArray);

		Product::create($createArray);

		return redirect()->route('product.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		$details = json_decode($product->details, true);
		$fields = Options::where('type_id', $product->type_id)->select('id', 'name', 'type_field')->get();
		return view('admin.product.edit', compact('product', 'fields', 'details'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(Product $product)
	{
		$this->validate(request(), [
			'name' => 'required',
		]);

		$createArray = [
			'name' => request('name'),
		];

		// image upload
		$image = request()->image;
		if ( $image ) {
			$imageName = $image->getClientSize() . $image->getClientOriginalName();
			$image->move('images', $imageName);
			$createArray['image'] = $imageName;
		}

		$ignoreArray = ['_token', 'type_id', 'category_id', 'attribute_id', 'name', 'image', '_method'];

		foreach(request()->all() as $key => $value) {
			if ( !in_array($key, $ignoreArray) ) {
				$detailsArray[$key] = $value;
			}
		}

		$createArray['details'] = json_encode($detailsArray);

		$product->update($createArray);

		return redirect()->route('product.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		$product->delete();

		return redirect()->route('product.index');
	}
}