@extends('layout.app')

@section('content')

	<h1>Add New Contact</h1>

	<hr />

<div class="col-md-6">
	<form action="{{ route('phonebook.store') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" />
		</div>

		<div class="form-group"> 
			<label for="contactnum">Contact Number</label>
			<input type="text" class="form-control" name="contactnum" />
		</div>

		<div class="form-group">
			<label for="picture">Picture</label>
			<input type="file" name="image" value="" />
		</div>

		<button type="submit" class="btn btn-primary">Save</button>
		<a href="{{ route('phonebook.index') }}" class="btn btn-default">Go Back</a>

	</form>
</div>

@endsection