@extends('layouts.admin')


@section('content')

	@if(Session::has('deleted_user'))
		<div class="alert alert-danger">{{ session('deleted_user') }}</div>
	@endif


	<h1>Users</h1>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Status</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>
					<img height = "50" src="{{ $user->photo ? $user->photo->file : '/images/default.png' }}">
				</td>
				<td><a href="{{route('users.edit', $user->id)}}">{{ $user->name }}</a></td>
				<td>{{ $user->email }}</td>
				<td>
					{{ $user->role_id != NULL ? ucfirst($user->role->name) : 'No Role' }}
				</td>
				<td>
					{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}
				</td>
				<td>{{ $user->created_at->diffForHumans() }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection