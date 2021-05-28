@extends('Backend.layout')
@section('title','Chỉnh sửa dịch vụ')
@section('content')
@section('css')
<link rel="stylesheet" href="{{url('public/vendor/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{url('public/css/custom.css')}}">
@stop('css')
<div class="container-fluid">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-info">
			<div class="panel-body">
				<form action="{{route('Service.update',['id' => $service->id])}}" method="POST" role="form">
					<legend>{{$service->name}}</legend>
					@csrf
					<input type="hidden" name="_method" value="PUT">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="">Tên dịch vụ</label>
								<input type="text" class="form-control" name="name" id="name" value="{{$service->name}}">
								@if($errors->has('name'))
								<div class="help-block">
									{{$errors->first('name')}}
								</div>
								@endif
							</div>
							<div class="form-group">
								<label for="">Trạng thái</label>
								<div class="radio">
									<label>
										<input type="radio" class="flat-red" name="status" value="1" {{($service->status == 1)?'checked':''}}>
										<span>Pulish</span>
									</label>
									<label>
										<input type="radio" class="flat-red" name="status" value="0" {{($service->status == 0)?'checked':''}}>
										<span>Unpulish</span>
									</label>
								</div>
							</div>
							<input type="hidden" id="slug" name="slug" value="{{$service->slug}}">
							<div class="form-group">
								<label for="">Miêu tả</label>
								<textarea name="description" class="form-control" id="content" rows="3">
									{{$service->description}}
								</textarea>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Sản phẩm phục vụ</label>
								<select name="product_id[]" class="form-control product" multiple>
									@foreach($product as $pro)
									<option value="{{$pro->id}}" 
									@foreach($service->service_menu as $menu)
									{{($menu->product_id == $pro->id)?'selected':''}}
									@endforeach
									>{{$pro->name}}</option>
									@endforeach
								</select>
								@if($errors->has('product_id'))
								<div class="help-block">
									{{$errors->first('product_id')}}
								</div>
								@endif
							</div>
							<div class="form-group">
								<label for="">Giá dịch vụ</label>
								<input type="number" class="form-control" name="price" value="{{$service->price}}">
								@if($errors->has('price'))
								<div class="help-block">
									{{$errors->first('price')}}
								</div>
								@endif
							</div>
							<div class="form-group">
								<label for="">Khuyến mại (%)</label>
								<div class="input-group">
									<input type="number" class="form-control" name="sale" value="{{$service->sale}}">
									<div class="input-group-addon">%</div>
								</div>
								@if($errors->has('sale'))
								<div class="help-block">
									{{$errors->first('sale')}}
								</div>
								@endif
							</div>
							<div class="form-group">
								<label for="">Hình minh họa</label>
								<div class="input-group">
									<input type="text" name="image" readonly id="image" value="{{$service->image}}" class="form-control">
									<span class="input-group-btn">
										<a href="#image-choose" data-toggle="modal" class="btn btn-primary"><i class="glyphicon glyphicon-picture"></i></a>
									</span>
								</div>
								<img src="{{url('public/images/service/'.$service->image)}}" id="show" width="100%">
							</div>
						</div>
					</div>


					<button type="submit" class="btn btn-success">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="image-choose">
	<div class="modal-dialog" style="width: 80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chọn hình ảnh sản phẩm</h4>
			</div>
			<div class="modal-body">
				<iframe src="
				{{url('filemanager')}}/dialog.php?akey=multiple_universer_from_earth1_move_to_earth2_with_name_HongTran0311_password_earth3&field_id=image" frameborder="0" width="100%" height="550px" style="border: 0;overflow-y: auto;"></iframe>
			</div>
		</div>
	</div>
</div>
@section('js')
<script src="{{url('public/js/Backend/auto_slug.js')}}"></script>
<script src="{{url('public/js/custom.js')}}"></script>
<script src="{{url('public/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('public/vendor/tinymce/config.js')}}"></script>
<script src="{{url('public/vendor/select2/dist/js/select2.min.js')}}"></script>
<script src="{{url('public/js/Backend/select2.js')}}"></script>
<script>
	$('#image-choose').on('hide.bs.modal',function () {
		var img = $('input#image').val();
		$('img#show').attr('src',img);
		$('input#image').attr('value',img);
	});
</script>
@stop('js')
@stop()