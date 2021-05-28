@extends('Backend.layout')
@section('title','Quản lý bình luận')
@section('content')
<div class="container-fluid" style="background-color: #F4E9E9;">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Người đăng</th>
				<th>Ngày đăng</th>
				<th>Trạng thái</th>
				<th>Phê duyệt</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			@foreach($comments as $cmt)
			<tr>
				<td width="45%" rowspan="2">
					<div class="media">
						<a class="pull-left" href="{{route('customer.show',['id' => $cmt->customer_id])}}">
							<img class="media-object" src="{{url('public/images/customers/'.$cmt->customer->avatar)}}" width="90px" style="border-radius: 50%;" alt="{{$cmt->customer->name}}">
						</a>
						<div class="media-body">
							<h4>{{$cmt->customer->first_name}} {{$cmt->customer->last_name}}</h4>
							<p>{{$cmt->content}}</p>
						</div>
					</div>
				</td>
				<td>{{date('d-m-Y s:m:h',strtotime($cmt->created_at))}}</td>
				<td>
					@if($cmt->status == 0)
					<span class="label label-primary">Đang chờ</span>
					@else
					<span class="label label-success">Hiển thị</span>
					@endif
				</td>
				<td>
					@if($cmt->status == 0)
					<a href="{{route('Comments.edit',['id' => $cmt->id])}}" title="chi tiết" class="btn btn-primary btn-sm">
						<i class="fa fa-check-square-o"></i>
					</a>
					@else
					<form action="{{route('Comments.update',['id' => $cmt->id])}}" method="POST">
						@csrf
						@method('PUT')
						<button class="btn btn-warning btn-sm">
							<i class="fa fa-refresh"></i>
						</button>
					</form>
					@endif
				</td>
				<td>
					<form action="{{route('Comments.destroy',['id' => $cmt->id])}}" method="POST">
						@csrf
						@method('DELETE')
						<button onclick="return confirm('Bạn chắc chắn rằng bạn muốn xóa?')" class="btn btn-danger btn-sm">
							<i class="fa fa-trash"></i>
						</button>
					</form>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<form class="form-horizontal">
						<div class="form-group margin-bottom-none">
							<div class="col-sm-9">
								<input class="form-control input-sm" placeholder="Nội dung....">
							</div>
							<div class="col-sm-3">
								<button type="submit" class="btn btn-primary pull-right btn-block btn-sm">Trả lời</button>
							</div>
						</div>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop()