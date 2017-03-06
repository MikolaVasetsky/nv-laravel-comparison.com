@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!! Form::open(['route' => ['category.update', $category->id], 'method' => 'put']) !!}
				<legend>Update category</legend>

				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', $category->name, ['class' => 'form-control', 'required' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
				</div>

				@include('admin.layouts.errors')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection