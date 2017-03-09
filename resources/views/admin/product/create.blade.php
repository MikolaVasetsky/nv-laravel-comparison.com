@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}
				<legend>Create product</legend>

				{!! Form::hidden('type_id', request()->type_id) !!}

				<div class="form-group">
					{!! Form::label('category_id', 'Select category') !!}
					{!! Form::select('category_id', $categories, '', ['class' => 'form-control', 'required' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('attribute_id', 'Select attribute') !!}
					{!! Form::select('attribute_id', $attributes, '', ['class' => 'form-control', 'required' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', '', ['class' => 'form-control', 'required' => '']) !!}
				</div>

				@foreach($fields as $field)
					<div class="form-group">
						@if($field->type_field == 'text')
							{!! Form::label($field->id, $field->name) !!}
							{!! Form::text($field->id, '', ['class' => 'form-control', 'required' => '']) !!}
						@else
							<label class="custom-control custom-checkbox">
								{!! Form::checkbox($field->id, '', '', ['class' => 'custom-control-input']) !!}
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">{{$field->name}}</span>
							</label>
						@endif
					</div>
				@endforeach

				<div class="form-group">
					{{ Form::label('image', 'Image') }}
					{{ Form::file('image', ['class' => 'form-control', 'required' => '']) }}
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