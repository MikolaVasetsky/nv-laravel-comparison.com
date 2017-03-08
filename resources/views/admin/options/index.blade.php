@extends('admin.layouts.master')

@section('content')
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Type field</th>
				<th>Name</th>
				<th>Type</th>
				<th>Attribute</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse($options as $option)
				<tr>
					<td>{{$option->id}}</td>
					<td>{{$option->type_field}}</td>
					<td>{{$option->name}}</td>
					<td>{{$option->type->name}}</td>
					<td>{{$option->attribute->name}}</td>
					<td>{{$option->created_at->toFormattedDateString()}}</td>
					<td>{{$option->updated_at->toFormattedDateString()}}</td>
					<td>
						<a href="{{route('options.edit', $option->id)}}" class="btn btn-info">Edit</a>
						{!! Form::open(['route' => ['options.destroy', $option->id], 'method' => 'delete']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@empty
				<h4>Empty data</h4>
			@endforelse
		</tbody>
	</table>
	{{$options->links()}}
</div>
@endsection
