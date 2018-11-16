@extends('layouts.admin')


@section('content')

	<h1>Users</h1>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
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
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ ucfirst($user->role->name) }}</td>
				<td>
					{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}
				</td>
				<td>{{ $user->created_at->diffForHumans() }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection