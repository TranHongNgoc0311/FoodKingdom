@extends('Backend.layout')
@section('title','Viết blog')
@section('css')
<link rel="stylesheet" href="{{url('public/vendor/select2/dist/css/select2.min.css')}}" />
@stop('css')
@section('content')
<div class="container-fluid">
	@if($errors->has('content'))
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Cảnh báo!</strong> {{$errors->first('content')}}
	</div>
	@endif
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<form action="{{route('Blog.store')}}" method="POST" role="form">
					@csrf
					<div class="col-md-8">
						<div class="form-group">
							<textarea name="content" id="blog" rows="30" style="max-width: 100%;" placeholder="Nội dung viết ở đây"></textarea>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Tiêu đề:</label>
							<input type="text" class="form-control" id="name" name="title" placeholder="Tiêu đề bài viết ở đây">
							@if($errors->has('title'))
							<div class="help-block">
								{{$errors->first('title')}}
							</div>
							@endif
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="slug" readonly name="slug" placeholder="Đường dẫn">
						</div>
						<div class="form-group">
							<label for="">Thẻ tag:</label>
							<select id="tag" name="tag_id[]" class="form-control" multiple>
								@foreach($tag as $t)
								<option value="{{$t->id}}">{{$t->name}}</option>
								@endforeach
							</select>
							@if($errors->has('tag_id'))
							<div class="help-block">
								{{$errors->first('tag_id')}}
							</div>
							@endif
						</div>
						<div class="form-group">
							<label for="">Hình minh họa:</label>
							<div class="thumbnail">
								<div class="input-group">
									<input type="text" class="form-control" id="image_link" name="image" readonly>
									<span class="input-group-btn">
										<a href="#image" data-toggle="modal" class="btn btn-primary">
											<i class="glyphicon-picture glyphicon"></i>
										</a>
									</span>
								</div>
								<img src="" id="show" style="width: 100%;" alt="">
							</div>
							@if($errors->has('image'))
							<div class="help-block">
								{{$errors->first('image')}}
							</div>
							@endif
						</div>
						<hr>
						<button type="submit" class="btn btn-success">Tạo blog</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="image">
	<div class="modal-dialog" style="width: 85%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<iframe src="
				{{url('filemanager')}}/dialog.php?akey=multiple_universer_from_earth1_move_to_earth2_with_name_HongTran0311_password_earth3&field_id=image_link" frameborder="0" width="100%" height="550px" style="border: 0;overflow-y: auto;"></iframe>
			</div>
		</div>
	</div>
</div>
@section('js')
<script src="{{url('public/vendor/select2/dist/js/select2.min.js')}}"></script>
<script src="{{url('public/js/Backend/auto_slug.js')}}"></script>
<script src="{{url('public/js/custom.js')}}"></script>
<script src="{{url('public/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('public/vendor/tinymce/custom.js')}}"></script>
<script>
	$('#tag').select2({
		width: '100%',
		placeholder: 'Chọn thẻ Tag'
	});
	$('#image').on('hide.bs.modal',function () {
		var img = $('input#image_link').val();
		$('img#show').attr('src',img);
		$('input#image_link').attr('value',img);
	});
</script>
@stop('js')
@stop()