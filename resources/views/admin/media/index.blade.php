@extends('layouts.admin')

@section('content')
	<h1>Media</h1>

	@if($photos)

	{!! Form::open(['method'=>'DELETE', 'class'=>'form-inline', 'action'=>['AdminMediaController@bulkDelete']]) !!}

	<div class="form-group">
		{!! Form::select('checkBoxArray', [''=>'Delete'], null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Submit', ['class'=>'btn btn-primary', 'name'=>'delete_bulk']) !!}
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>{!! Form::checkbox('options', null, null, ['id'=>'options']) !!}</th>
				<th>ID</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Created</th>
				{{-- <th>Actions</th> --}}
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
					{!! Form::hidden('media_id', $photo->id, []) !!}
					{{-- <div class="form-group">
						{!! Form::submit('Delete', ['class'=>'btn btn-danger', 'name'=>'delete_single']) !!}
					</div> --}}
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