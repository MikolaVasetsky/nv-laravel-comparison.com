@extends('admin.layouts.master')

@section('content')
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Type</th>
				<th>Category</th>
				<th>Details</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse($products as $product)
				<tr>
					<td>{{$product->id}}</td>
					<td>{{$product->name}}</td>
					<td>{{$product->type->name}}</td>
					<td>{{$product->category->name}}</td>
					<td><a class="btn btn-warning" href="{{route('product.show', $product->id)}}">More</a></td>
					<td>{{$product->created_at->toFormattedDateString()}}</td>
					<td>{{$product->updated_at->toFormattedDateString()}}</td>
					<td>
						<a href="{{route('product.edit', $product->id)}}" class="btn btn-info">Edit</a>
						{!! Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@empty
				<h4>Empty data</h4>
			@endforelse
		</tbody>
	</table>
	{{$products->links()}}
</div>
@endsection
