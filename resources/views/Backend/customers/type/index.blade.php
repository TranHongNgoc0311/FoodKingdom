@extends('Backend.layout')
@section('title','Loại khách hàng')
@section('css')
<link rel="stylesheet" href="{{url('public/css/custom.css')}}">
@stop('css')
@section('content')
<div class="container-fluid">
	<div class="col-md-8">
		<div class="row">
			<table class="table table-striped table-hover" style="background-color: #EBE2E2;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tên</th>
						<th>Khuyến mại</th>
						<th>Ưu đãi</th>
						<th>Điều kiện</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($type as $tp)
					<tr>
						<td>{{$tp->id}}</td>
						<td>{{$tp->name}}</td>
						<td>
							<span class="label {{($tp->sale_percent == 0)?'label-danger':'label-success'}}">{{$tp->sale_percent}} %</span>
						</td>
						<td width="40%">{{$tp->bonus}}</td>
						<td>
							<button type="button" class="btn btn-sm btn-info condition" data-toggle="tooltip" data-placement="right" title="{{(empty($tp->condition_type))?'không có điều kiện':$tp->condition_type}}"><i class="fa fa-eye"></i></button>
						</td>
						<td>
							<form action="{{route('CustomerType.destroy',['id' => $tp->id])}}" method="POST">
								@csrf
								@method('DELETE')
								<button onclick="return confirm('Bạn chắc chắn rằng bạn muốn xóa?')" title="ban" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
								<a href="{{route('CustomerType.edit',['id' => $tp->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-4 thumbnail">
		<div class="container-fluid" style="background-color: #E7F2A0;padding-bottom: 10px;">
			<form action="{{route('CustomerType.store')}}" method="POST" role="form">
				<legend>Thêm loại khách hàng</legend>
				@csrf
				<div class="form-group">
					<label>Tên:</label>
					<input type="text" class="form-control" name="name">
				</div>
				@if($errors->has('name'))
				<div class="help-block">{{$errors->first('name')}}</div>
				@endif
				<div class="form-group">
					<label>Khuyến mại (%):</label>
					<input type="number" class="form-control" id="sale_percent" name="sale_percent" min="0" value="" max="100">
				</div>
				@if($errors->has('sale_percent'))
				<div class="help-block">{{$errors->first('sale_percent')}}</div>
				@endif
				<div class="form-group">
					<label>Ưu đãi</label>
					<input type="text" class="form-control" name="bonus">
				</div>
				<div class="form-group">
					<label>Điều kiện:</label>
					<textarea name="condition_type" class="form-control" rows="3" style="max-width: 100%;"></textarea>
				</div>



				<button type="submit" class="btn btn-success">Thêm</button>
			</form>
		</div>
	</div>
</div>
@stop()