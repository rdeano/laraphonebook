@extends('layout.app')

@section('content')

	<h1>Update Contact</h1>

	<hr />

	@if ($errors->any()) 
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div> <br />
	@endif

<div class="col-md-6">


	<form action="{{ route('phonebook.update', $phonebook->id) }}" method="POST" enctype="multipart/form-data">
		{{ method_field('PATCH') }}

		{{ csrf_field() }}

		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" value="{{ $phonebook->name }}" />
		</div>

		<div class="form-group">
			<label for="contactnum">Contact Number</label>
			<input type="text" class="form-control" name="contactnum" value="{{ $phonebook->contactnum }}" />
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