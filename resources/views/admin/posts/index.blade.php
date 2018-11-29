@extends('layouts.admin')


@section('content')
	<h1>Posts</h1>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Photo</th>
				<th>Owner</th>
				<th>Category</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{{ $post->id }}</td>
				<td>
					<img height = "100" src="{{ $post->photo ? $post->photo->file : '/images/default.png' }}">
				</td>
				<td>{{ $post->user->name }}</td>
				<td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
				<td>{{ $post->title }}</td>
				<td>{{ $post->body }}</td>
				<td>{{ $post->created_at->diffForHumans() }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection