@extends('Frontend.layouts.main')
@section('title',$service->name)
@section('css')
<link rel="stylesheet" href="{{url('public/css/customer.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@stop('css')
@section('style')
<style>
h3{
	margin-top: 10px;
	margin-bottom: 0;
}
</style>
@stop('style')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					<img class="img-responsive" src="{{url('public/images/service/'.$service->image)}}" alt="Product image">

					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>Tên dịch vụ:</b> <a class="pull-right"><small>{{$service->name}}</small></a>
						</li>
						<li class="list-group-item">
							<b>Giá:</b> <a class="pull-right">{{$service->price}} VNĐ</a>
						</li>
						<li class="list-group-item">
							<b>Trạng thái:</b> <a class="pull-right">
								<small>
									@if($service->status == 0)
									<span class="label label-danger">Ngừng hỗ trợ</span>
									@else
									<span class="label label-info">Hỗ trợ</span>
									@endif
								</small>
							</a>
						</li>
						<li class="list-group-item">
							<b>Khuyến mại (%):</b> 
							<a class="pull-right"><span class="label label-success">{{$service->sale}} %</span></a>
						</li>
					</ul>
				</div>
				<div class="panel-footer">
					<div class="container-fluid text-center">
						<a href="" class="btn btn-lg btn-primary" style="padding: 10px 20px">Đặt dịch vụ</a>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="info active"><a href="#description" data-toggle="tab">Giới thiệu dịch vụ</a></li>
					<li class="menu"><a href="#images" data-toggle="tab">Menu dịch vụ</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="description">
						{{$service->description}}
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane" id="images">
						<div class="container">
							<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
								<div class="col-md-7 heading-section text-center ftco-animate">
									<h2 class="mb-4">Thực đơn hỗ trợ</h2>
									<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
								</div>
							</div>
							<div class="container-fluid">
								@foreach($service->service_menu as $menu)
								<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
									<div class="thumbnail" style="height: 450px;">
										<img src="{{url('public/images/products/'.$menu->product->image)}}" width="100%" alt="">
										<div class="caption">
											<h3 class="text-muted" style="font-size: 24px;">{{$menu->product->name}}</h3>
											<p>
												{!! substr(strip_tags($menu->product->description),0,150) !!}
											</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	@section('js')
	<script>
		$('.linked').hover(function(){ $(this).addClass('active'); },function(){
			$(this).removeClass('active');
		});
		$('.info').click(function () {
			$(this).addClass('active');
			$('.menu').removeClass('active');
		})
		$('.menu').click(function () {
			$(this).addClass('active');
			$('.info').removeClass('active');
		})
	</script>
	@stop('js')
	@stop()