@extends('layouts.admin')


@section('content')
	<h1>Edit Post</h1>

	<div class="col-sm-3">
		<img height = "100" src="{{ $post->photo ? $post->photo->file : '/images/default.png' }}">
	</div>

	<div class="col-sm-9">
		{!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

		<div class="form-group">
			{!! Form::label('title','Title:') !!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Category:', []) !!}
			{!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Choose Category...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Photo:') !!}
			{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('body', 'Content:') !!}
			{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Edit Post', ['class'=>'btn btn-primary col-sm-6']) !!}
		</div>

		{!! Form::close() !!}

		{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

		<div class="form-group">
			{!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
		</div>

		@include('includes.form_error')

	</div>

@endsection