@extends('Frontend.layouts.main')
@section('title',$customer->username)
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="{{url('public/fonts/text-color.css')}}">
<link rel="stylesheet" href="{{url('public/vendor/jQueryUI/themes/mint-choc/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{url('public/vendor/jQueryUI/datepicker.css')}}">
<link rel="stylesheet" href="{{url('public/vendor/Ionicons/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{url('public/css/Profile.css')}}">
<link rel="stylesheet" href="{{url('public/css/customer.css')}}">
<link rel="stylesheet" href="{{url('public/vendor/iCheck/all.css')}}">
@stop('css')
@section('style')
<style>
.fa-4{
	color: rgba(255,255,255,0.65);
}
#order_list{
	background-repeat: no-repeat;
	background-position: center;
	background-attachment: fixed;
	background-image: url({{url('public/images/bg/bg_1.jpg')}});
}
</style>
@stop('style')
@section('content')
<div id="profile">
	<header>
		<div class="container">
			<div class="heading-wrapper">
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="info">
							<i class="icon ion-ios-location-outline"></i>
							<div class="right-area">
								<h6>Địa chỉ:</h6>
								@if($customer->address)
								<h5>{{$customer->address}}</h5>
								@else
								<h5>Updating...</h5>
								@endif
							</div><!-- right-area -->
						</div><!-- info -->
					</div><!-- col-sm-4 -->

					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="info">
							<i class="icon ion-ios-telephone-outline"></i>
							<div class="right-area">
								<h6>Số điện thoại:</h6>
								@if($customer->phone)
								<h5>{{$customer->phone}}</h5>
								@else
								<h5>Updating...</h5>
								@endif
							</div><!-- right-area -->
						</div><!-- info -->
					</div><!-- col-sm-4 -->

					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="info">
							<i class="icon ion-ios-chatboxes-outline"></i>
							<div class="right-area">
								<h6>Email:</h6>
								<h5>{{$customer->email}}</h5>
							</div><!-- right-area -->
						</div><!-- info -->
					</div><!-- col-sm-4 -->
				</div><!-- row -->
			</div>
		</div><!-- container -->
	</header>
	<section class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-md-1 col-lg-2"></div>
				<div class="col-md-10 col-lg-8">
					<div class="intro">
						<div class="profile-img"><img src="{{url('public/images/customers/'.$customer->avatar)}}" alt="" class="img-responsive"></div>
						<h2><b>{{$customer->first_name}} {{$customer->last_name}}</b></h2>
						<h4 class="font-yellow">Key Account Manager</h4>
						<ul class="information margin-tb-30">
							@if($customer->birth)
							<li>
								<i class="fa fa-calendar text-orange"></i> 
								<b>Ngày sinh : </b>{{date('M d, Y',strtotime($customer->birth))}}
							</li>
							@endif
							<li><i class="fa fa-venus-mars text-red"></i> <b>Giới tính : </b> 
								@if($customer->gender == 1)
								Nam <i class="fa fa-mars"></i> 
								@else
								Nữ <i class="fa fa-venus"></i> 
								@endif
							</li>
							<li>
								<i class="fa fa-star-o text-yellow"></i> <b>Điểm tích : </b>
								<span class="label label-success">{{$customer->point}} điểm</span>
							</li>
						</ul>

						<ul class="social-icons">
							<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
							<li><a href="#"><i class="ion-social-linkedin"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram"></i></a></li>
							<li><a href="#"><i class="ion-social-facebook"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="portfolio-section section" style="background: rgba(53,47,47,0.3);">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="heading">
						<h3 style="color: #8E6161;"><b id="heading_title">{{($errors->any())?'Cập nhật':'Hóa đơn'}}</b></h3>
						<h6 class="font-lite-black"><b id="heading_info">{{($errors->any())?'Cập nhật thông tin người dùng':'Danh sách hóa đơn'}}</b></h6>
					</div>
				</div><!-- col-sm-4 -->
				<div class="col-sm-8">
					<div class="portfolioFilter clearfix margin-b-80 nav nav-pills">
						<a href="#order_list" class="{{($errors->any())?'':'current'}}" data-toggle="tab" id="info"><b>Danh sách hóa đơn</b></a>
						<a href="#update_info" class="{{($errors->any())?'current':''}}" data-toggle="tab" id="edit"><b>Thay đổi thông tin</b></a>
						<a href="{{route('password_change')}}"><b>Đổi mật khẩu</b></a>
					</div><!-- portfolioFilter -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
		</div><!-- container -->
		
		<div class="portfolioContainer">
			<div class="container-fluid">
				<div class="col-md-10 col-md-offset-1">
					<div class="tab-content">
						<div class="{{($errors->any())?'':'active'}} tab-pane" id="order_list">
							<div class="container-fluid">
								<div class="panel panel-default" style="margin-top: 20px;background: rgba(53,47,47,0.6);" id="orders">
									<div class="panel-body table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>ID</th>
													<th>Dịch vụ</th>
													<th>Loại dịch vụ</th>
													<th>Số bàn (suất)</th>
													<th>Ngày tạo</th>
													<th>Trạng thái</th>
													<th>Chi tiết</th>
													<th>Xóa</th>
												</tr>
											</thead>
											<tbody>
												@foreach($customer->order as $order)
												<tr>
													<td><span class="label label-default">{{$order->id}}</span></td>
													<td>{{$order->service->name}}</td>
													<td>
														@if($order->service_type == 1)
														Tại gia
														@else
														Tại Food - Kingdom
														@endif
													</td>
													<td>{{$order->table_count}}</td>
													<td>{{date('M d, Y',strtotime($order->created_at))
														.' at '.date('H:m:s',strtotime($order->created_at))}}
													</td>
													<td>
														@if($order->status == 1)
														<span class="label label-primary">Chờ duyệt</span>
														@elseif($order->status == 2)
														<span class="label label-info">Đã duyệt</span>
														@elseif($order->status == 3)
														<span class="label label-warning">Chờ thanh toán</span>
														@elseif($order->status == 4)
														<span class="label label-danger">Hủy</span>
														@else
														<span class="label label-success">Đã hoàn tất</span>
														@endif
													</td>
													<td>
														<a href="{{route('Order.show',['id' => $order->id])}}" class="btn btn-sm btn-info">
															<i class="fa fa-eye"></i>
														</a>
													</td>
													<td>
														<a href="{{route('Order.delete',['id' => $order->id])}}" class="btn btn-sm btn-danger">
															<i class="fa fa-trash"></i>
														</a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="{{($errors->any())?'active':''}} tab-pane" id="update_info">
							<div class="container-fluid">
								<div class="panel panel-default" style="margin-top: 20px;margin-bottom: 20px;background: rgba(53,47,47,0.2);">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-8">
												<div class="container-fluid" style="background: rgba(66,60,60,0.6);">
													<form role="form" action="{{route('Customer.update',['id' => $customer->id])}}" method="POST" style="margin-bottom: 10px;margin-top: 10px;" enctype="multipart/form-data">
														@csrf
														@method('PUT')
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Tên đăng nhập:</label>
																	<input type="text" class="form-control" name="username" value="{{$customer->username}}">
																</div>
																@if($errors->has('username'))
																<div class="help-block">
																	{{$errors->first('username')}}
																</div>
																@endif
															</div>
															<div class="col-md-6">
																<div class="form-group" style="border: 1px solid #4D4545;">
																	<div class="radio">
																		<label for="">Giới tính:</label>
																		<div class="radio">
																			<label>
																				<input type="radio" class="flat-red" name="gender" value="1" {{($customer->gender == 1)?"checked":""}}>
																				<span>Nam</span> <i class="fa fa-mars"></i>
																			</label>
																			<label>
																				<input type="radio" class="flat-red" name="gender" value="0" {{($customer->gender == 0)?"checked":""}}>
																				<span>Nữ</span> <i class="fa fa-venus"></i>
																			</label>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Tên:</label>
																	<input type="text" class="form-control" name="last_name" value="{{$customer->last_name}}">
																</div>
																@if($errors->has('last_name'))
																<div class="help-block">
																	{{$errors->first('last_name')}}
																</div>
																@endif
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Họ:</label>
																	<input type="text" class="form-control" name="first_name" value="{{$customer->first_name}}">
																</div>
																@if($errors->has('first_name'))
																<div class="help-block">
																	{{$errors->first('first_name')}}
																</div>
																@endif
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Số điện thoại</label>
																	<input type="text" class="form-control" name="phone" value="{{$customer->phone}}">
																</div>
																@if($errors->has('phone'))
																<div class="help-block">
																	{{$errors->first('phone')}}
																</div>
																@endif
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Ngày sinh:</label>
																	<input type="text" readonly id="datepicker" value="{{date('d/m/Y',strtotime($customer->birth))}}" class="form-control" name="birth">
																</div>
																@if($errors->has('birth'))
																<div class="help-block">
																	{{$errors->first('birth')}}
																</div>
																@endif
															</div>
														</div>
														<div class="form-group">
															<label for="">Email:</label>
															<input type="text" class="form-control" name="email" value="{{$customer->email}}">
														</div>
														@if($errors->has('email'))
														<div class="help-block">
															{{$errors->first('email')}}
														</div>
														@endif
														<div class="form-group">
															<label for="">Địa chỉ</label>
															<input type="text" class="form-control" name="address" value="{{$customer->address}}">
														</div>
														@if($errors->has('address'))
														<div class="help-block">
															{{$errors->first('address')}}
														</div>
														@endif

													</div>
												</div>
												<div class="col-md-4">
													<div class="container-fluid" style="background: rgba(66,60,60,0.6);">
														<div class="form-group">
															<label for="">Ảnh đại điện</label>
															<input type="file" name="image" onchange="imgPreview(this)" class="form-control">
														</div>
														<div class="preview">
															@if(!empty($customer->avatar))
															<img src="{{url('public/images/customers/'.$customer->avatar)}}" class="img-thumbnail" width="100%" style="margin-bottom: 15px;">
															@endif
														</div>
														@if($errors->has('image'))
														<div class="help-block">
															{{$errors->first('image')}}
														</div>
														@endif
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12" style="margin-top: 20px;">
													<button type="submit" class="btn btn-lg downlad-btn">Chập nhật</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- portfolioContainer -->

	</section>
</div>
@section('js')
<script src="{{url('public/vendor/iCheck/icheck.min.js')}}"></script>
<script src="{{url('public/vendor/jQueryUI/jquery-ui.min.js')}}"></script>
<script src="{{url('public/js/custom.js')}}"></script>
<script>
	$('.linked').hover(function(){ $(this).addClass('active'); },function(){
		$(this).removeClass('active');
	});
	$(function() {
		$("#edit").click(function() {
			$(this).addClass("current");
			$('#info').removeClass('current');
			$('#heading_title').text('Cập nhật');
			$('#heading_info').text('Cập nhật thông tin người dùng');
		});
		$("#info").click(function() {
			$(this).addClass("current");
			$('#edit').removeClass('current');
			$('#heading_title').text('Hóa đơn');
			$('#heading_info').text('Danh sách hóa đơn');
		});
		$( "#datepicker" ).datepicker({
			showAnim: 'slideDown',
			changeMonth: true,
			changeYear: true,
			yearRange: "-80:+0",
			dateFormat: "dd/mm/yy"
		});
	});
	function imgPreview(input) {
		if (input.files && input.files[0]) {
			var file = new FileReader();
			file.onload = function (img) {
				$html = '<img src="'+img.target.result+'" class="img-thumbnail" width="100%" style="margin-bottom: 15px;">';
				$('.preview').html($html);
			};
			file.readAsDataURL(input.files[0]);
		}
	}
</script>
@stop('js')
@stop()