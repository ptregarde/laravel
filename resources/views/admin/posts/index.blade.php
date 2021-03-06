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
				<th>Title</th>
				<th>Owner</th>
				<th>Category</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{{ $post->id }}</td>
				<td>
					<img height = "50" src="{{ $post->photo ? $post->photo->file : '/images/default.png' }}">
				<td>
					<a href="{{route('posts.edit', $post->id)}}">
						{{ $post->title }}
					</a>
				</td>
				</td>
				<td> {{ $post->user->name }} </td>
				<td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
				<td>{{ $post->created_at->diffForHumans() }}</td>
				<td>
					<a href="{{route('home.post', $post->slug)}}">
						<div class="btn btn-primary">View Post</div>
					</a>
				</td>
				<td>
					<a href="{{route('comments.show', $post->id)}}">
						<div class="btn btn-primary">View Comments</div>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="row">
		<div class="col-sm-6 col-sm-offset-5">
			{{$posts->render()}}
		</div>
	</div>
@endsection