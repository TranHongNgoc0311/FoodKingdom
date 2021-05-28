@extends('Backend.layout')
@section('title','Sửa thẻ tag')
@section('content')
<div class="container-fluid">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="{{route('Tag.update',['id' => $tag->id])}}" method="POST" role="form">
					<legend><i class="glyphicon glyphicon-upload text-blue"></i> {{$tag->name}}</legend>
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="">Tên:</label>
						<input type="text" class="form-control" name="name" id="name" value="{{$tag->name}}">
						@if($errors->has('name'))
						<div class="help-block">
							{{$errors->first('name')}}
						</div>
						@endif
					</div>
					
					<div class="form-group">
						<label for="">Đường dân:</label>
						<input type="text" class="form-control" readonly style="cursor: pointer;" name="slug" id="slug" value="{{$tag->slug}}">
					</div>
					

					
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>
</div>
@section('js')
<script src="{{url('public/js/Backend/auto_slug.js')}}"></script>
<script src="{{url('public/js/custom.js')}}"></script>
@stop('js')
@stop()