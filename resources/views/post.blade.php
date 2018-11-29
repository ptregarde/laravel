@extends('layouts.blog-post')

@section('content')
	<!-- Blog Post -->

	<!-- Title -->
	<h1>{{$post->title}}</h1>

	<!-- Author -->
	<p class="lead">
	    by <a href="#">{{$post->user->name}}</a>
	</p>

	<hr>

	<!-- Date/Time -->
	<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

	<hr>

	<!-- Preview Image -->
	<img class="img-responsive" src="{{$post->photo->file}}" alt="">

	<hr>

	<!-- Post Content -->
	<p> {{$post->body}}</p>

	<hr>

	@if(Auth::check()) 
	<!-- Blog Comments -->
	<!-- Comments Form -->
	<div class="well">
		@if(Session::has('comment_success'))
			<div class="alert alert-success">
				{{session('comment_success')}}
			</div>
		@endif
	    <h4>Leave a Comment:</h4>


	    {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

	    {!! Form::hidden('post_id', $post->id, []) !!}

	    <div class="form-group">
	    	{{-- {!! Form::label('body', 'Body:', []) !!} --}}
	    	{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
	    </div>

	    <div class="form-group">
	    	{!! Form::submit('Post Comment', ['class'=>'btn btn-primary']) !!}
	    </div>

	    {!! Form::close() !!}

	</div>

	@endif

	<hr>

	<!-- Posted Comments -->

	<!-- Comment -->
	@if(count($comments) > 0)
		@foreach($comments as $comment)
			<div class="media">
			    <a class="pull-left" href="#">
			        <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
			    </a>
			    <div class="media-body">
			        <h4 class="media-heading">
			        	{{$comment->author}}
			            <small>{{$comment->created_at->diffForHumans()}}</small>
			        	
			        </h4>
			        {{$comment->body}}

			        @if(count($comment->replies) > 0)
			        	@foreach($comment->replies as $reply)

			        	@if($reply->is_active)
				        <div id="nested-comment" class="media">
				            <a class="pull-left" href="#">
				                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
				            </a>
				            <div class="media-body">
				                <h4 class="media-heading">
				                	{{$reply->author}}
				                    <small>{{$reply->created_at->diffForHumans()}}</small>
				                	
				                </h4>
				                {{$reply->body}}
				            </div>

				            <div class="comment-reply-container">
				            	<button class="toggle-reply btn btn-primary pull-right">Reply</button>

				            	<div class="comment-reply col-sm-6">
				            		
						            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@store']) !!}

						            {!! Form::hidden('comment_id', $comment->id, []) !!}

						            <div class="form-group">
						            	{!! Form::label('body', 'Reply:', []) !!}
						            	{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
						            </div>

						            <div class="form-group">
						            	{!! Form::submit('Reply Comment', ['class'=>'btn btn-primary']) !!}
						            </div>

						            {!! Form::close() !!}

						        </div>
						    </div>
				        </div>
				        @endif
				        @endforeach
			        @endif
			    </div>
			</div>
		@endforeach
	@endif


@endsection


@section('scripts')
	<script type="text/javascript">
		$(".toggle-reply").click(function(){
			$(this).next().slideToggle("slow");
		});

	</script>
@endsection