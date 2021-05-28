<?php  
function TotalPrice($order)
{
	$result = 0;
	$service_price = $order->service->price * $order->service->sale / 100;
	$type_price = ($order->service_type == 1)? '15000':'';
	foreach ($order->details as $details) {
		$product_price = $details->menu->price - $details->menu->price * $details->menu->sale / 100;
		$result += $product_price * $order->table_count;
	}
	return $result + $service_price + $type_price;
}
?>
@extends('Backend.layout')
@section('title','Danh sách đơn hàng')
@section('style')
<style>
.menu-wrap .menu-img {
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center center;
	display: block;
	width: 200px;
	height: 200px;
	margin: 0 auto;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	border-radius: 50%;
}
.mb-4{
	margin-bottom: 1.5rem !important;
}
.menu-wrap {
	margin-bottom: 35px;
}
</style>
@stop('style')
@section('content')
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-body">
			<legend>Danh sách đơn hàng</legend>
			<div class="panel-body table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Mã ID</th>
							<th>Khách hàng</th>
							<th>Số bàn (suất)</th>
							<th>Tổng (VNĐ)</th>
							<th>Trạng thái</th>
							<th>Ngày tạo</th>
							<th>Xóa</th>
							<th>Chi tiết</th>
							<th>Cập nhật</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order as $od)
						<tr>
							<td><span class="label label-default">{{$od->id}}</span></td>
							<td>{{$od->first_name}} {{$od->last_name}}</td>
							<td>{{$od->table_count}}</td>
							<td>{{number_format(TotalPrice($od),2,",",".")}}</td>
							<td>
								@if($od->status == 1)
								<span class="label label-primary">Chờ duyệt</span>
								@elseif($od->status == 2)
								<span class="label label-info">Đã duyệt</span>
								@elseif($od->status == 3)
								<span class="label label-warning">Chờ thanh toán</span>
								@elseif($od->status == 4)
								<span class="label label-danger">Hủy</span>
								@else
								<span class="label label-success">Đã hoàn tất</span>
								@endif
							</td>
							<td>{{date('d-m-Y h:m:s',strtotime($od->created_at))}}</td>
							<td>
								<form action="{{route('order.destroy',['category' => $od])}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="DELETE">
									<button onclick="return confirm('Bạn chắc chắn rằng bạn muốn xóa?')" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
								</form>
							</td>
							<td>
								<a href="{{route('order.show',['id' => $od->id])}}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
							</td>
							<td>
								<a class="btn btn-sm btn-warning" data-toggle="modal" href='#{{$od->id}}'><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<div class="modal fade" id="{{$od->id}}">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Đơn hàng mã: <span class="label label-default">{{$od->id}}</span></h4>
									</div>
									<div class="modal-body">
										<div class="panel panel-default">
											<div class="panel-heading">
												<form action="{{route('order.update',['id' => $od->id])}}" method="POST">
													@csrf
													@method('PUT')
													<div class="form-group">
														<div class="input-group">
															<select name="status" class="form-control">
																<option value="1" {{($od->status == 1)?'selected':''}}>Chờ phê duyệt</option>
																<option value="2" {{($od->status == 2)?'selected':''}}>Phê duyệt</option>
																<option value="3" {{($od->status == 3)?'selected':''}}>Chờ thanh toán</option>
																<option value="4" {{($od->status == 4)?'selected':''}}>Hủy</option>
																<option value="5" {{($od->status == 5)?'selected':''}}>Hoàn thành</option>
															</select>
															<span class="input-group-btn">
																<button type="submit" class="btn btn-primary">Cập nhật</button>
															</span>
														</div>
													</div>
												</form>
											</div>
											<div class="panel-body">
												<div class="container-fluid">
													@foreach($od->details as $detail)
													<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 text-center ftco-animate">
														<div class="menu-wrap">
															<div class="menu-img img mb-4" style="background-image: url({{url('public/images/products/'.$detail->menu->image)}});"></div>
															<div class="text">
																<h4>{{$detail->menu->name}}</h4>
																<p><b>Giá:</b> <span class="text-muted">{{$detail->menu->price}} VNĐ</span></p>
															</div>
														</div>
													</div>
													@endforeach
												</div>

											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{$order->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@section('js')
<script src="{{url('public/js/Backend/default.js')}}"></script>
<script src="{{url('public/js/Backend/auto_slug.js')}}"></script>
@stop('js')
@stop()