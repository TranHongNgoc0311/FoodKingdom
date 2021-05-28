@extends('Backend.layout')
@section('title','Danh sách khách hàng bị BAN')
@section('content')
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-body">
			<legend>Danh sách khách hàng</legend>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Khách hàng</th>
							<th>Ngày tạo</th>
							<th>Trạng thái</th>
							<th>Xóa</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($customers as $cus)
						<tr>
							<td>{{$cus->id}}</td>
							<td width="50%">
								<div class="media">
									<a class="pull-left" href="#">
										@if(!empty($cus->avatar))
										<img class="media-object" src="{{url('public/images/customers/'.$cus->avatar)}}" width="80px" height="80px" alt="Image">
										@else
										<i class="fa fa-user-circle fa-4"></i>
										@endif
									</a>
									<div class="media-body">
										<h4 class="media-heading">Khách hàng: {{$cus->first_name}} {{$cus->last_name}}</h4>
										<p>{{(empty($cus->username))?'['.$cus->provider.']':$cus->username}}</p>
									</div>
								</div>
							</td>
							<td>{{date('d-m-Y',strtotime($cus->created_at))}}</td>
							<td>
								từ từ
							</td>
							<td>
								<form action="{{route('customer.destroy',['id' => $cus->id])}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="DELETE">
									<button onclick="return confirm('Bạn chắc chắn rằng bạn muốn xóa?')" title="ban" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
								</form>
							</td>
							<td>
								<a href="{{route('customer.show',['id' => $cus->id])}}" title="xem thông tin" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
								<a href="{{route('customer_ban',['id' => $cus->id,'ban' => 1])}}" title="khôi phục" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{$customers->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@stop()