@extends('Backend.layout')
@section('title',$product->name)
@section('content')
<div class="row">
	<div class="col-md-3">

		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="img-responsive" src="{{url('public/images/products/'.$product->image)}}" alt="Product image">

				<h3>{{$product->name}}</h3>

				<p class="text-muted"><b>Danh mục: </b>{{$product->category->name}}</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Giá sản phẩm:</b> <a class="pull-right">{{$product->price}}</a>
					</li>
					<li class="list-group-item">
						<b>Khuyến mại:</b> <a class="pull-right">{{$product->sale}}%</a>
					</li>
					<li class="list-group-item">
						<b>Trạng thái:</b> 
						<a class="pull-right">
							@if($product->status == 1)
							<span class="label label-primary">Còn</span>
							@else
							<span class="label label-danger">Hết</span>
							@endif
						</a>
					</li>
				</ul>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

		<!-- About Me Box -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Thời gian</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<strong><i class="glyphicon glyphicon-time margin-r-5"></i> Ngày tạo :</strong>

				<span class="text-muted">{{date('d-m-Y',strtotime($product->created_at))}}</span>

				<hr>

				<strong><i class="fa fa-upload margin-r-5"></i> Ngày cập nhật: </strong>

				<span class="text-muted">{{date('d-m-Y',strtotime($product->updated_at))}}</span>
				<hr>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#description" data-toggle="tab">Miêu tả</a></li>
				<li><a href="#images" data-toggle="tab">Hình minh họa</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="description">
					{{$product->description}}
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="images">
					@if(is_array($images))
					@foreach($images as $img)
					<div class="container-fluid" style="margin-bottom: 10px;">
						<img src="{{$img}}" class="img-thumbnail" width="100%" alt="hình minh họa">
					</div>
					@endforeach
					@endif
				</div>
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div>
		<!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
@stop()