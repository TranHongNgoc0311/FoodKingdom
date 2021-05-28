@extends('Backend.layout')
@section('title','Danh sách sản phẩm')
@section('content')
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-body">
			<legend>Danh sách sản phẩm</legend>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Sản phẩm</th>
							<th>Ngày tạo</th>
							<th>Trạng thái</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($product as $pro)
						<tr>
							<td>{{$pro->id}}</td>
							<td width="40%">
								<div class="media">
									<a class="pull-left" href="#">
										<img class="media-object" src="{{url('public/images/products/'.$pro->image)}}" width="100" alt="Image">
									</a>
									<div class="media-body">
										<h4 class="media-heading">{{substr($pro->name,0,57)}}</h4>
										<p>Danh mục: {{$pro->category->name}}</p>
									</div>
								</div>
							</td>
							<td>{{date('d-m-Y h:m:s',strtotime($pro->created_at))}}</td>
							<td>
								@if($pro->status == 1)
								<span class="label label-primary">Còn</span>
								@else
								<span class="label label-danger">Hết</span>
								@endif
							</td>
							<td>
								<form action="{{route('Product.destroy',['id' => $pro->id])}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="DELETE">
									<button onclick="return confirm('Bạn chắc chắn rằng bạn muốn xóa?')" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
									<a href="{{route('Product.show',['product' => $pro])}}" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
									<a href="{{route('Product.edit',['product' => $pro])}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{$product->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@stop()