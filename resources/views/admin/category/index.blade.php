@extends('admin.layouts.master')

@section('content')
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Type</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>{{$category->type->name}}</td>
					<td>{{$category->created_at->toFormattedDateString()}}</td>
					<td>{{$category->updated_at->toFormattedDateString()}}</td>
					<td>
						<a href="{{route('category.edit', $category->id)}}" class="btn btn-info">Edit</a>
						{!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'delete']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@empty
				<h4>Empty data</h4>
			@endforelse
		</tbody>
	</table>
</div>
@endsection
