@extends('Backend.layout')
@section('title',$type->name)
@section('css')
<link rel="stylesheet" href="{{url('public/css/custom.css')}}">
@stop('css')
@section('content')
<div class="container-fluid">
	<div class="col-md-offset-3 col-md-6">
		<div class="container-fluid" style="background-color: #E7F2A0;padding-bottom: 10px;">
			<form action="{{route('CustomerType.update',['id' => $type->id])}}" method="POST" role="form">
				<legend>Thêm loại khách hàng</legend>
				@csrf
				@method('PUT')
				<div class="form-group">
					<label>Tên:</label>
					<input type="text" class="form-control" value="{{$type->name}}" name="name">
				</div>
				@if($errors->has('name'))
				<div class="help-block">{{$errors->first('name')}}</div>
				@endif
				<div class="form-group">
					<label>Khuyến mại (%):</label>
					<input type="number" class="form-control" id="sale_percent" value="{{$type->sale_percent}}" name="sale_percent" min="0" max="100">
				</div>
				@if($errors->has('sale_percent'))
				<div class="help-block">{{$errors->first('sale_percent')}}</div>
				@endif
				<div class="form-group">
					<label>Ưu đãi</label>
					<input type="text" class="form-control" value="{{$type->bonus}}" name="bonus">
				</div>
				<div class="form-group">
					<label>Điều kiện:</label>
					<textarea name="condition_type" class="form-control" rows="3" style="max-width: 100%;">
						{{$type->condition_type}}
					</textarea>
				</div>



				<button type="submit" class="btn btn-primary">Cập nhật</button>
			</form>
		</div>
	</div>
</div>
@stop()