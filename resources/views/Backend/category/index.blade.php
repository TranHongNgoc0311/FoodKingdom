@extends('Backend.layout')
@section('title','Danh sách danh mục')
@section('content')
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-body">
			<legend>Danh sách danh mục</legend>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên danh mục</th>
							<th>Số sản phẩm</th>
							<th>Ngày tạo</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
						@foreach($category as $cat)
						<tr>
							<td>{{$cat->id}}</td>
							<td>{{$cat->name}}</td>
							<td>{{count($cat->product)}}</td>
							<td>{{date('d-m-Y h:m:s',strtotime($cat->created_at))}}</td>
							<td>
								<form action="{{route('Category.destroy',['category' => $cat])}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="DELETE">
									<button onclick="return confirm('Bạn chắc chắn rằng bạn muốn xóa?')" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{$category->links()}}
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-warning">
			<div class="panel-body">
				<form action="{{route('Category.update',['id' => 1])}}" method="POST" role="form">
					<legend>Chỉnh sửa thông tin danh mục</legend>
					@csrf
					<input type="hidden" name="_method" value="PUT">	
					<div class="form-group">
						<select name="id" id="input" class="form-control" required="required">
							<option selected disabled>-- Chọn danh mục cần sửa --</option>
							@foreach($category as $cat)
							<option value="{{$cat->id}}">{{$cat->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Tên danh mục">
						<input type="hidden" id="slug" name="slug">
					</div>

					

					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>
</div>
@section('js')
<script src="{{url('public/js/Backend/default.js')}}"></script>
<script src="{{url('public/js/Backend/auto_slug.js')}}"></script>
@stop('js')
@stop()