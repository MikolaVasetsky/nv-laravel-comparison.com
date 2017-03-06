@extends('admin.layouts.master')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Categories</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
	        @forelse($types as $type)
				<tr>
					<td>{{$type->id}}</td>
					<td>{{$type->name}}</td>
					<td></td>
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
</div>
@endsection
