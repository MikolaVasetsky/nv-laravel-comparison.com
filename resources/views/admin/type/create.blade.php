@extends('admin.layouts.master')

@section('contant')
<div class="container">
	<div class="row">
		<form action="" method="POST" role="form">
			<legend>Form title</legend>

			<div class="form-group">
				<label for="">label</label>
				<input type="text" class="form-control" id="" placeholder="Input field">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection