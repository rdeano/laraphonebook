@extends('layout.app')


@section('content')

	@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div> <br />
	@endif

	<div>
	    <a href="{{ route('phonebook.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Contact</a>
	</div>

	<hr >
	<div class="">
		<table class="table table-striped">
			<thead>
				<th style="width:10%;"></th>
				<th>Name</th>
				<th>Contact Number</th>
				<th>Action</th>
			</thead>

			<tbody>

				@foreach ($phonebooks as $phonebook)
					<tr>
						<?php 
							if ($phonebook->profile_pic == "") {
								$phonebook->profile_pic = "upload/default.png";
							}
						?>

						<td><img src="{{url('/storage/app')}}{{'/'.$phonebook->profile_pic}}" style="width:50px;height:50px;" /></td>
						<td>{{ $phonebook->name }}</td>
						<td>{{ $phonebook->contactnum }}</td>
						<td>
							<a href="{{ route('phonebook.edit', $phonebook->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
							<form action="{{ route('phonebook.destroy', ['id' => $phonebook->id] ) }}" method="POST" style="display:inline-block;">
							{{method_field('DELETE')}}
   							{!! csrf_field() !!}

							<input type="submit" value="Delete" class="btn btn-danger" />
							
						</form>

						</td>
					</tr>
				@endforeach

				

			</tbody>
		</table>

		{{$phonebooks->links()}}
	</div>
@endsection
