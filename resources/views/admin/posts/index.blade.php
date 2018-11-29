@extends('layouts.admin')


@section('content')
	@if(Session::has('deleted_user'))
		<div class="alert alert-danger">{{ session('deleted_user') }}</div>
	@endif

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
				<td>
					<a href="{{route('posts.edit', $post->id)}}">
						{{ $post->user->name }}
					</a>
				</td>
				<td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
				<td>{{ $post->title }}</td>
				<td>{{ str_limit($post->body, 30) }}</td>
				<td>{{ $post->created_at->diffForHumans() }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection