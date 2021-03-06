@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!! Form::open(['route' => 'options.store', 'method' => 'post']) !!}
				<legend>Create option</legend>

				{!! Form::hidden('type_id', request()->type_id) !!}

				<div class="form-group">
					{!! Form::label('attribute_id', 'Select attribute') !!}
					{!! Form::select('attribute_id', $attributes, '', ['class' => 'form-control', 'required' => '', 'id' => 'select_attribute']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('type_field', 'Type') !!}
					{!! Form::select('type_field', ['text' => 'Text field', 'checkbox' => 'Check field'], '', ['class' => 'form-control', 'required' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', '', ['class' => 'form-control', 'required' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
				</div>

				@include('admin.layouts.errors')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection