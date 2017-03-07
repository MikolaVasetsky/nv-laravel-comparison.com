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
			@forelse($attributes as $attribute)
				<tr>
					<td>{{$attribute->id}}</td>
					<td>{{$attribute->name}}</td>
					<td>{{$attribute->type->name}}</td>
					<td>{{$attribute->created_at->toFormattedDateString()}}</td>
					<td>{{$attribute->updated_at->toFormattedDateString()}}</td>
					<td>
						<a href="{{route('attribute.edit', $attribute->id)}}" class="btn btn-info">Edit</a>
						{!! Form::open(['route' => ['attribute.destroy', $attribute->id], 'method' => 'delete']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@empty
				<h4>Empty data</h4>
			@endforelse
		</tbody>
	</table>
	{{$attributes->links()}}
</div>
@endsection
