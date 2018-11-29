@extends('layouts.admin')

@section('content')
	<h1>Comments</h1>

	@if(count($comments) > 0)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Author</th>
				<th>Email</th>
				<th>Comment</th>
				<th>Commented</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($comments as $comment)
			<tr>
				<td>{{$comment->id}}</td>
				<td>{{$comment->author}}</td>
				<td>{{$comment->email}}</td>
				<td>{{$comment->body}}</td>
				<td>{{$comment->created_at->diffForHumans()}}</td>
				<td>
					<a href="{{route('home.post', $comment->post->id)}}">
						<div class="btn btn-primary">View Post</div>
					</a>
				</td>				
				<td>
					<a href="{{route('replies.show', $comment->id)}}">
						<div class="btn btn-primary">View Replies</div>
					</a>
				</td>
				<td>
					@if($comment->is_active)
						{!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

						{!! Form::hidden('is_active', 0) !!}

						<div class="form-group">
							{!! Form::submit('Unapprove', ['class'=>'btn btn-warning']) !!}
						</div>

						{!! Form::close() !!}

					@else
						{!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

						{!! Form::hidden('is_active', 1) !!}

						<div class="form-group">
							{!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
						</div>

						{!! Form::close() !!}
					@endif
				</td>

				<td>
					{!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

					<div class="form-group">
						{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
					</div>

					{!! Form::close() !!}

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	@else

	<div class="text-center">
		<h3>No Comments</h3>
	</div>
	@endif
@endsection