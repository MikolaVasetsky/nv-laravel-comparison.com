@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!! Form::open(['route' => 'attribute.store', 'method' => 'post']) !!}
				<legend>Create attribute</legend>

				{!! Form::hidden('type_id', request()->type_id) !!}

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