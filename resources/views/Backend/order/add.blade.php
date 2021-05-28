@extends('Backend.layout')
@section('title','Tạo danh mục')
@section('content')
@section('css')
<link rel="stylesheet" href="{{url('public/css/custom.css')}}">
@stop('css')
<div class="container-fluid">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-info">
			<div class="panel-body">
				<form action="{{route('Category.store')}}" method="POST" role="form">
					<legend>Tạo danh mục</legend>
					@csrf
					<div class="form-group">
						<label for="">Tên danh mục</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Tên danh mục...">
						@if($errors->has('name'))
						<div class="help-block">
							{{$errors->first('name')}}
						</div>
						@endif
					</div>
					<input type="hidden" id="slug" name="slug">
					<div class="form-group">
						<label for="">Trạng thái</label>
						<div class="radio">
							<label>
								<input type="radio" class="flat-red" name="status" value="1" checked="checked">
								<span>Pulish</span>
							</label>
							<label>
								<input type="radio" class="flat-red" name="status" value="0">
								<span>Unpulish</span>
							</label>
						</div>
					</div>



					<button type="submit" class="btn btn-success">Tạo danh mục</button>
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