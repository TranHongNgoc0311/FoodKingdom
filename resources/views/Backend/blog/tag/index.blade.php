@extends('Backend.layout')
@section('title','Thêm tag')
@section('content')
<div class="container-fluid">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="{{route('Tag.store')}}" method="POST" role="form">
					<legend><i class="glyphicon glyphicon-plus-sign text-green"></i> Thêm thẻ Tag</legend>
					@csrf
					<div class="form-group">
						<label for="">Tên:</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Tên thẻ...">
						@if($errors->has('name'))
						<div class="help-block">
							{{$errors->first('name')}}
						</div>
						@endif
					</div>
					
					<div class="form-group">
						<label for="">Đường dân:</label>
						<input type="text" class="form-control" readonly style="cursor: pointer;" name="slug" id="slug" placeholder="Đường dẫn...">
					</div>
					

					
					<button type="submit" class="btn btn-success">Tạo</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<form action="{{route('Tag_delete')}}" method="POST" role="form">
			@csrf
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>
									<button type="submit" class="btn btn-sm btn-danger">
										<i class="glyphicon-trash glyphicon"></i>
									</button>
								</th>
								<th>Tên</th>
								<th>Ngày tạo</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($tag as $t)
							<tr>
								<td><input type="checkbox" class="flat-red" name="id[]" value="{{$t->id}}"></td>
								<td>{{$t->name}}</td>
								<td>{{$t->created_at}}</td>
								<td>
									<a href="{{route('Tag.edit',['id' => $t->id])}}" class="btn btn-sm btn-warning">
										<i class="fa fa-edit"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
@section('js')
<script src="{{url('public/js/Backend/auto_slug.js')}}"></script>
<script src="{{url('public/js/custom.js')}}"></script>
@stop('js')
@stop()