@extends('Backend.layout')
@section('title','Thêm sản phẩm')
@section('css')
<link rel="stylesheet" href="{{url('public/css/custom.css')}}">
@stop('css')
@section('content')
<div class="row">
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-body">
				<legend>Thêm sản phẩm</legend>
				<form action="{{route('Product.store')}}" method="POST" role="form">
					<div class="row">
						<div class="col-md-8 col-lg-8">
							@csrf
							<div class="form-group">
								<label for="">Tên sản phẩm</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Tên sản phẩm...">
								@if($errors->has('name'))
								<div class="help-block">
									{{$errors->first('name')}}
								</div>
								@endif
							</div>
							<div class="form-group">
								<label for="">Đường dẫn</label>
								<input type="text" readonly style="cursor: auto;" id="slug" class="form-control" name="slug">
							</div>
							<div class="form-group">
								<label for="">Hình ảnh khác</label>
								<input type="hidden" readonly id="image_list" name="image_list">
								<div class="container-fluid">
									<a href="#multi_img" data-toggle="modal" class="btn btn-primary row"><i class="fa fa-laptop"></i></a>
								</div>
								<div class="row" style="margin-top: 10px;" id="show_list"></div>
							</div>
							<div class="form-group">
								<label for="">Miêu tả</label>
								<textarea name="description" class="form-control" id="content" rows="3"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, quod temporibus pariatur modi! Quis quibusdam, a incidunt ratione animi voluptate, atque autem nesciunt ea iure unde eaque dolor natus obcaecati.</span>
									<span>Inventore quidem non laudantium eveniet enim neque, est dolorem suscipit sint maiores quis consequatur quaerat nihil perspiciatis ea, incidunt aliquid nemo atque minima aliquam quod, temporibus beatae voluptas? Nesciunt, quas.</span>
									<span>Architecto explicabo dolores dicta maxime perferendis suscipit dolore, voluptatum praesentium iste. Expedita quaerat adipisci amet sequi consequuntur consequatur ex dolorum, fugit voluptatum, officia distinctio at odit maiores! Eum, consequuntur molestiae!</span>
									<span>Voluptatem dolorem labore laborum exercitationem. Expedita aliquam earum, aliquid neque corporis quod necessitatibus tempore perspiciatis nam quae suscipit. Architecto eum deleniti harum provident ea officiis aliquid consectetur nostrum ab at.</span>
									<span>Vel vero nesciunt quidem enim, modi qui, quod quae eum sapiente molestiae, tempore voluptate quibusdam libero asperiores explicabo officiis minima harum. Ducimus necessitatibus illum cum obcaecati voluptates at maiores accusantium.</span>
									<span>Commodi voluptas quae tenetur ad rem magni, alias iure asperiores modi sequi corporis eum debitis odio sit aliquam laborum molestias amet illum eveniet quas incidunt facere? Dolore ipsam ullam nemo!</span>
								</textarea>
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="">Danh mục</label>
								<div class="div_arrow">
									<select name="cat_id" class="form-control arrow">
										<option disabled selected>-- Chọn danh mục --</option>
										@foreach($category as $cat)
										<option value="{{$cat->id}}">{{$cat->name}}</option>
										@endforeach
									</select>
									<i class="caret"></i>
								</div>
								@if($errors->has('cat_id'))
								<div class="help-block">
									{{$errors->first('cat_id')}}
								</div>
								@endif
							</div>
							<div class="form-group">
								<label for="">Giá sản phẩm</label>
								<input type="number" class="form-control" name="price" placeholder="Giá...">
								@if($errors->has('price'))
								<div class="help-block">
									{{$errors->first('price')}}
								</div>
								@endif
							</div>
							<div class="form-group">
								<label for="">Khuyến mãi (%)</label>
								<div class="input-group">
									<input type="number" class="form-control" name="sale" placeholder="Khuyến mãi ...">
									<div class="input-group-addon">%</div>
								</div>
								@if($errors->has('sale'))
								<div class="help-block">
									{{$errors->first('sale')}}
								</div>
								@endif
							</div>
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
							<div class="form-group">
								<label for="">Hình ảnh</label>
								<div class="thumbnail">
									<div class="input-group" style="margin-bottom: 5px;">
										<input type="text" style="cursor: auto;" readonly name="image" value="" class="form-control" id="image">
										<span class="input-group-btn">
											<a href="#choose_img" data-toggle="modal" class="btn btn-info">
												<i class="glyphicon glyphicon-picture"></i>
											</a>
										</span>
									</div>
									<img src="" alt="" id="show" style="width: 100%">
								</div>
								@if($errors->has('image'))
								<div class="help-block">
									{{$errors->first('image')}}
								</div>
								@endif
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success">Thêm sản phẩm</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="choose_img">
	<div class="modal-dialog" style="width: 80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chọn hình ảnh sản phẩm</h4>
			</div>
			<div class="modal-body">
				<div class="panel panel-default" style="background-color: #fff">
					<div class="panel-body">
						<iframe src="
						{{url('filemanager')}}/dialog.php?akey=multiple_universer_from_earth1_move_to_earth2_with_name_HongTran0311_password_earth3&field_id=image" frameborder="0" width="100%" height="550px" style="border: 0;overflow-y: auto;"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="multi_img">
	<div class="modal-dialog" style="width: 80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chọn hình ảnh minh họa</h4>
			</div>
			<div class="modal-body">
				<div class="panel panel-default" style="background-color: #fff">
					<div class="panel-body">
						<iframe src="
						{{url('filemanager')}}/dialog.php?akey=multiple_universer_from_earth1_move_to_earth2_with_name_HongTran0311_password_earth3&field_id=image_list" frameborder="0" width="100%" height="550px" style="border: 0;overflow-y: auto;"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@section('js')
<script src="{{url('public/js/Backend/auto_slug.js')}}"></script>
<script src="{{url('public/js/custom.js')}}"></script>
<script src="{{url('public/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('public/vendor/tinymce/config.js')}}"></script>
<script>
	$('#choose_img').on('hide.bs.modal',function () {
		var img = $('input#image').val();
		$('img#show').attr('src',img);
		$('input#image').attr('value',img);
	});

	$('#multi_img').on('hide.bs.modal',function () {
		var img = $('input#image_list').val();
		var list = $.parseJSON(img);
		var html = '';
		for (var i = 0; i <list.length; i++) {
			html += '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><div class="thumbnail"><img src="'+list[i]+'" alt=""></div></div>'
		}
		$('#show_list').html(html);
	});
</script>
@stop('js')
@stop()