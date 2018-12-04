@extends('layouts.admin')

@section('content')
	<h1>Replies</h1>

	@if(count($replies) > 0)
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Author</th>
				<th>Email</th>
				<th>Reply</th>
				<th>Replied</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($replies as $reply)
			<tr>
				<td>{{$reply->id}}</td>
				<td>{{$reply->author}}</td>
				<td>{{$reply->email}}</td>
				<td>{{$reply->body}}</td>
				<td>{{$reply->created_at->diffForHumans()}}</td>
				<td>
					<a href="{{route('home.post', $reply->comment->post->slug)}}">
						<div class="btn btn-primary">View</div>
					</a>
				</td>
				<td>
					@if($reply->is_active)
						{!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

						{!! Form::hidden('is_active', 0) !!}

						<div class="form-group">
							{!! Form::submit('Unapprove', ['class'=>'btn btn-warning']) !!}
						</div>

						{!! Form::close() !!}

					@else
						{!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

						{!! Form::hidden('is_active', 1) !!}

						<div class="form-group">
							{!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
						</div>

						{!! Form::close() !!}
					@endif
				</td>

				<td>
					{!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}

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
		<h3>No replies</h3>
	</div>
	@endif
@endsection