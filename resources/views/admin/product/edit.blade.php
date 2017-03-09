@extends('admin.layouts.master')

@section('content')
<div class="container">
{{-- {{dd($product)}} --}}
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!! Form::open(['route' => ['product.update', $product->id], 'method' => 'put', 'files' => true]) !!}
				<legend>Update product</legend>

				<p>{{$product->type->name}} -> {{$product->category->name}}</p>

				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name', $product->name, ['class' => 'form-control', 'required' => '']) !!}
				</div>

				<div class="form-group">
					<img src="/images/{{$product->image}}" class="img-thumbnail">
				</div>

				<div class="form-group">
					{{ Form::label('image', 'Image') }}
					{{ Form::file('image', ['class' => 'form-control']) }}
				</div>

				@foreach($fields as $field)
					<div class="form-group">
						@if($field->type_field == 'text')
							{!! Form::label($field->id, $field->name) !!}
							{!! Form::text($field->id, array_key_exists($field->id, $details) ? $details[$field->id] : '', ['class' => 'form-control', 'required' => '']) !!}
						@else
							<label class="custom-control custom-checkbox">
								{!! Form::checkbox($field->id, $field->name, array_key_exists($field->id, $details) ? : '', ['class' => 'custom-control-input']) !!}
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">{{$field->name}}</span>
							</label>
						@endif
					</div>
				@endforeach

				<div class="form-group">
					{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
				</div>
				@include('admin.layouts.errors')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection