@extends('admin.layouts.master')

@section('content')
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Categories</th>
				<th>Attributes</th>
				<th>Updated At</th>
				<th>Action</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse($types as $type)
				<tr>
					<td>{{$type->id}}</td>
					<td>{{$type->name}}</td>
					<td><a class="btn btn-warning" href="{{route('category.show', $type->id)}}">{{$type->category->count()}}</a></td>
					<td><a class="btn btn-warning" href="{{route('attribute.show', $type->id)}}">{{$type->attribute->count()}}</a></td>
					<td>{{$type->created_at->toFormattedDateString()}}</td>
					<td>{{$type->updated_at->toFormattedDateString()}}</td>
					<td>
						<a href="{{route('type.edit', $type->id)}}" class="btn btn-info">Edit</a>
						{!! Form::open(['route' => ['type.destroy', $type->id], 'method' => 'delete']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@empty
				<h4>Empty data</h4>
			@endforelse
		</tbody>
	</table>
	{{$types->links()}}
</div>
@endsection
