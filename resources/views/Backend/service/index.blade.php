@extends('Backend.layout')
@section('title','Danh sách dịch vụ')
@section('content')
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-body">
			<legend>Danh sách dịch vụ</legend>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên dịch vụ</th>
							<th>Giá dịch vụ</th>
							<th>Khuyến mại</th>
							<th>Khuyến mại</th>
							<th>Ngày tạo</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($service as $sv)
						<tr>
							<td>{{$sv->id}}</td>
							<td>{{$sv->name}}</td>
							<td>{{$sv->price}}</td>
							<td>
								<span class="label label-primary">{{$sv->sale}} %</span>
							</td>
							<td>
								@if($sv->status == 0)
								<span class="label label-danger">Hết</span>
								@else
								<span class="label label-primary">Còn</span>
								@endif
							</td>
							<td>{{date('d-m-Y h:m:s',strtotime($sv->created_at))}}</td>
							<td>
								<form action="{{route('Service.destroy',['id' => $sv->id])}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="DELETE">
									<button onclick="return confirm('Bạn chắc chắn rằng bạn muốn xóa?')" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
									<a href="{{route('Service.edit',['id' => $sv->id])}}" class="btn btn-sm btn-warning">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									<a href="{{route('Service.show',['id' => $sv->id])}}" class="btn btn-sm btn-info">
										<i class="glyphicon glyphicon-eye-open"></i>
									</a>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{$service->links()}}
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