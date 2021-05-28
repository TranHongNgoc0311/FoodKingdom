@extends('Frontend.layouts.main')
@section('title','Đặt dịch vụ '.$service->name)
@section('css')
<link rel="stylesheet" href="{{url('public/vendor/iCheck/all.css')}}">
@stop('css')
@section('style')
<style>
.help-block{
	font-size: 13px;
	line-height: 1.8;
}
#appointment-form h2 {
	line-height: 1.8;
	margin: 0;
	padding: 0;
	font-weight: bold;
	color: #222;
	margin-bottom: 30px;
}
.menu-wrap{
	position: relative;
	padding: 10px;
	margin-bottom: 35px;
	cursor: pointer;
	border: 1px solid;
}
.icheckbox_polaris{
	position: absolute;
	left: 0;
	top: 0;
}
input, select {
	width: 100%;
	display: block;
	border: none;
	border-bottom: 2px solid #ebebeb;
	padding: 5px 0;
	color: #222;
	margin-bottom: 31px;
	font-family: 'Roboto Slab';
}
input, select, textarea {
	outline: none;
	appearance: unset !important;
	-moz-appearance: unset !important;
	-webkit-appearance: unset !important;
	-o-appearance: unset !important;
	-ms-appearance: unset !important;
}
.submit {
	width: auto;
	background: #4966b1;
	color: #fff;
	padding: 16px 17px;
	font-size: 13px;
	border: none;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-o-border-radius: 5px;
	-ms-border-radius: 5px;
	cursor: pointer;
	box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7);
	-moz-box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7);
	-webkit-box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7);
	-o-box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7);
	-ms-box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7);
}
input, select, textarea {
	outline: none;
	appearance: unset !important;
	-moz-appearance: unset !important;
	-webkit-appearance: unset !important;
	-o-appearance: unset !important;
	-ms-appearance: unset !important;
}
.appointment-form {
	padding: 50px 60px 70px 60px;
}
.appointment-form h3,.appointment-form h4{
	font-weight: bold;
	color: #222;
	margin: 0px;
	font-size: 15px;
	border-bottom: 1px solid #000;
	display: inline-block;
}
.appointment-form h4{
	margin-bottom: 15px;
}
.appointment-form h3{
	margin-bottom: 35px;
}
.menu-wrap .menu-img {
	width: 150px;
	height: 150px;
}
input:focus, select:focus {
	color: #222;
	border-bottom: 2px solid #4966b1; 
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
}

input[type=number] {
	-moz-appearance:textfield; /* Firefox */
}
input[name=table_count]:disabled{
	background: none;
	opacity: 0.5;
}
</style>
@stop('style')
@section('content')
<div class="container-fluid" style="margin-top: 10px; margin-bottom: 20px;">
	<div class="container ftco-animate" style="background-color: #fff;">
		<form method="POST" action="{{route('Order.store')}}" class="appointment-form" id="appointment-form">
			<h2>{{$service->name}}</h2>
			@csrf
			<input type="hidden" name="id" value="{{$service->id}}">
			<div class="form-group-1">
				<h3>Thông tin người thanh toán dịch vụ</h3>
				<div class="row">
					<div class="col-md-6">
						@if($errors->has('first_name'))
						<div class="help-block">
							{{$errors->first('first_name')}}
						</div>
						@endif
						<input type="text" name="first_name" id="first_name" placeholder="Họ" value="{{(Auth::guard('customer')->check())?Auth::guard('customer')->user()->first_name:''}}">
					</div>
					<div class="col-md-6">
						@if($errors->has('last_name'))
						<div class="help-block">
							{{$errors->first('last_name')}}
						</div>
						@endif
						<input type="text" name="last_name" id="last_name" placeholder="Tên" value="{{(Auth::guard('customer')->check())?Auth::guard('customer')->user()->last_name:''}}">
					</div>
				</div>
				@if($errors->has('email'))
				<div class="help-block">
					{{$errors->first('email')}}
				</div>
				@endif
				<input type="email" name="email" id="email" placeholder="Email" value="{{(Auth::guard('customer')->check())?Auth::guard('customer')->user()->email:''}}">
				@if($errors->has('address'))
				<div class="help-block">
					{{$errors->first('address')}}
				</div>
				@endif
				<input type="text" name="address" placeholder="Địa chỉ" value="{{(Auth::guard('customer')->check())?Auth::guard('customer')->user()->address:''}}">
				<div class="row">
					<div class="col-md-6">
						@if($errors->has('phone'))
						<div class="help-block">
							{{$errors->first('phone')}}
						</div>
						@endif
						<input type="text" name="phone" placeholder="Số điện thoại" value="{{(Auth::guard('customer')->check())?Auth::guard('customer')->user()->phone:''}}">
					</div>
					<div class="col-md-6">
						@if($service->type == 1)
						<div class="row">
							<div class="col-md-6">
								@if($errors->has('service_type'))
								<div class="help-block">
									{{$errors->first('service_type')}}
								</div>
								@endif
								<div class="select-list">
									<select name="service_type" id="type">
										<option selected disabled> Loại dịch vụ</option>
										<option value="1"> Tại gia</option>
										<option value="2"> Tại nhà hàng</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								@if($errors->has('table_count'))
								<div class="help-block">
									{{$errors->first('table_count')}}
								</div>
								@endif
								<input type="number" name="table_count" disabled placeholder="Số lượng bàn (suất ăn)" />
							</div>
						</div>
						@else
						@if($errors->has('table_count'))
						<div class="help-block">
							{{$errors->first('table_count')}}
						</div>
						@endif
						<input type="hidden" name="service_type" value="{{($service->type == 2)?1:2}}">
						<input type="number" name="table_count" placeholder="Số lượng {{($service->type == 2)?'suất ăn':'bàn'}}" />
						@endif
					</div>
				</div>
			</div>
			<div class="form-group-2">
				<h3>Menu - dịch vụ</h3>
				@if($errors->has('product_id'))
				<div class="help-block" style="margin-bottom: 20px;">
					{{$errors->first('product_id')}}
				</div>
				@endif
				<div class="row" style="margin-bottom: 20px;">
					@foreach($service->service_menu as $menu)
					<div class="col-md-3 text-center ftco-animate">
						<div class="menu-wrap">
							<input type="checkbox" name="product_id[]" class="polaris" value="{{$menu->product->id}}">
							<div class="menu-img img mb-4" style="background-image: url({{url('public/images/products/'.$menu->product->image)}});"></div>
							<div class="text">
								<h4>{{$menu->product->name}}</h4>
								<p><b>Giá:</b> <span class="text-muted">{{$menu->product->price}} đ</span></p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="form-submit">
				<input type="submit" id="submit" class="submit" value="Đặt dịch vụ" />
			</div>
		</form>
	</div>
</div>
@section('js')
<script src="{{url('public/vendor/iCheck/icheck.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$('input[type="checkbox"].polaris').iCheck({
			checkboxClass: 'icheckbox_polaris',
			radioClass: 'iradio_polaris',
			increaseArea: '-10%'
		});
		$('.menu-wrap').click(function ()
		{
			$(this).iCheck('toggle')
		});
		$('#type').change(function() {
			$('input[name="table_count"]').removeAttr('disabled');
		});
		/*$('input[name="table_count"]').keypress(function() {
			var count = $(this).val();
			var max = $('input[name="table_count"]').attr('max');
			alert(typeof max);
			if (count > max) {
				$('#error_').text('Lỗi');
				$('#submit').css({'cursor':'not-allowed','opacity':'0.6'});
			}
		});*/
	});
</script>
@stop('js')
@stop()