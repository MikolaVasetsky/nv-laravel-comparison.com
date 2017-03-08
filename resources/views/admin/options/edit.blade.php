@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!! Form::open(['route' => ['options.update', $option->id], 'method' => 'put']) !!}
				<legend>Update option</legend>

				<p>{{$option->type->name}} -> {{$option->attribute->name}}</p>

				<div class="form-group">
					{!! Form::label('type_field', 'Type') !!}
					{!! Form::select('type_field', ['text' => 'Text field', 'checkbox' => 'Check field'], $option->type_field, ['class' => 'form-control', 'required' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', $option->name, ['class' => 'form-control', 'required' => '']) !!}
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