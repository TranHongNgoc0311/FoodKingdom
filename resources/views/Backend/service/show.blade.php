@extends('Backend.layout')
@section('title',$service->name)
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-info">
			<div class="panel-body">
				<div class="media">
					<a class="pull-left">
						<img class="media-object img-thumbnail" src="{{url('public/images/service/'.$service->image)}}" width="300px" alt="Image">
					</a>
					<div class="media-body">
						<h3 class="media-heading">Dịch vụ: {{$service->name}}</h3>
						<p class="text-muted">Trạng thái: 
							@if($service->status == 1)
							<span class="label label-primary">Còn</span>
							@else
							<span class="label label-danger">Hết</span>
							@endif
						</p>
						<p class="text-muted">Giá dịch vụ: {{$service->price}} VNĐ</p>
						<p class="text-muted">Khuyến mại: {{$service->sale}}%</p>
						<p class="text-muted">Ngày tạo: {{$service->created_at}}</p>
						<p class="text-muted">Ngày cập nhật: {{$service->updated_at}}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#description" data-toggle="tab">Miêu tả</a></li>
				<li><a href="#menu" data-toggle="tab">Menu</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="description">
					<div class="thumbnail">
						{{$service->description}}
					</div>
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="menu">
					<div class="container-fluid">
						@foreach($service->service_menu as $menu)
						<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
							<a href="{{route('Product.show',['id' => $menu->product->id])}}">
								<div class="thumbnail">
									<img src="{{url('public/images/products/'.$menu->product->image)}}" alt="Hình minh họa">
									<div class="caption">
										<h3>{{$menu->product->name}}</h3>
										<p class="text-muted">Trạng thái: 
											@if($menu->product->status == 1)
											<span class="label label-primary">Còn</span>
											@else
											<span class="label label-danger">Hết</span>
											@endif
										</p>
										<p class="text-muted">Giá dịch vụ: {{$menu->product->price}} VNĐ</p>
										<p class="text-muted">Khuyến mại: {{$menu->product->sale}}%</p>
									</div>
								</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div>
	</div>
</div>
@stop()