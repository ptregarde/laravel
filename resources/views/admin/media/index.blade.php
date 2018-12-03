@extends('layouts.admin')

@section('content')
	<h1>Media</h1>

	@if($photos)

	{!! Form::open(['method'=>'POST', 'class'=>'form-inline', 'action'=>['AdminMediaController@bulkDelete']]) !!}

	<div class="form-group">
		{!! Form::select('checkBoxArray', ['delete'=>'Delete'], null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>{!! Form::checkbox('options', null, null, ['id'=>'options']) !!}</th>
				<th>ID</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Created</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach($photos as $photo)
			<tr>
				<td>{!! Form::checkbox('checkBoxArray[]', $photo->id, null, ['class'=>'checkBoxes']) !!}</td>
				<td>{{ $photo->id }}</td>
				<td>
					<img height="50" src="{{ $photo->file ? $photo->file : 'images/default.png' }}">
				</td>
				<td>{{ $photo->file }}</td>
				<td>{{ $photo->created_at->diffForHumans() }}</td>
				<td>
					{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}

					<div class="form-group">
						{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
					</div>
					
					{!! Form::close() !!}


				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{!! Form::close() !!}

	@endif


@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
		$('#options').click(function(){
			if(this.checked){
				$('.checkBoxes').each(function(){
					this.checked = true;
				});
			}

			else{
				$('.checkBoxes').each(function(){
					this.checked = false;
				});
			}
		});
	});
</script>

@endsection