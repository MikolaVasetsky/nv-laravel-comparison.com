@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!! Form::open(['route' => ['type.update', $type->id], 'method' => 'put']) !!}
				<legend>Update type</legend>

				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', $type->name, ['class' => 'form-control', 'required' => '']) !!}
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