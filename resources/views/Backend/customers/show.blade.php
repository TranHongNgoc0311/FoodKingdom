@extends('Backend.layout')
@section('title',$customer->first_name.' '.$customer->last_name)
@section('content')
<div class="row">
	<div class="col-md-3">

		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile text-center">
				@if(!empty($customer->avatar))
				<img class="img-responsive" src="{{url('public/images/customers/'.$customer->avatar)}}" alt="Ảnh đại diện">
				@else
				<i class="fa fa-user-circle" style="font-size: 7em"></i>
				@endif

				<h3>{{$customer->first_name}} {{$customer->last_name}} </h3>

				<p class="text-muted"><b>
					@if(empty($customer->username))
					<span class="label label-info">{{$customer->provider}}</span>
					@else
					{{$customer->username}}
					@endif
				</b></p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Loại khách hàng:</b> <a class="pull-right">chưa có</a>
					</li>
					<li class="list-group-item">
						<b>Điểm tích:</b> <a class="pull-right"><span class="label label-success">{{$customer->point}}</span></a>
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

				<span class="text-muted"><a class="pull-right">{{date('d-m-Y',strtotime($customer->created_at))}}</a></span>

				<hr>

				<strong><i class="fa fa-upload margin-r-5"></i> Ngày cập nhật: </strong>

				<span class="text-muted"><a class="pull-right">{{date('d-m-Y',strtotime($customer->updated_at))}}</a></span>
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
				<li class="active"><a href="#description" data-toggle="tab">Hồ sơ</a></li>
				<li><a href="#images" data-toggle="tab">Hóa đơn đã đặt</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="description">
					<div class="container-fluid">
						<div class="col-md-6">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">Thông tin chung</h3>
								</div>
								<div class="panel-body">
									<strong><i class="fa fa-vcard-o text-light-blue margin-r-5"></i> Họ và tên:</strong>
									<span class="text-muted"><a class="pull-right">
										{{$customer->first_name}} {{$customer->last_name}}
									</a></span>
									<hr>
									<strong><i class="fa fa-calendar margin-r-5 text-yellow"></i> Ngày sinh: </strong>
									<span class="text-muted"><a class="pull-right">
										{{date('M d-Y',strtotime($customer->birth))}}
									</a></span>
									<hr>
									<strong><i class="fa fa-venus-mars margin-r-5 text-olive"></i> Giới tính: </strong>
									<span class="text-muted"><a class="pull-right">
										@if($customer->gender == 1)
										Nam <i class="fa fa-mars"></i> 
										@else
										Nữ <i class="fa fa-venus"></i> 
										@endif
									</a></span>
									<hr>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-info">
								<div class="panel-body">
									<legend>Thông tin liên hệ</legend>
									<ul class="list-group">
										<li class="list-group-item">
											<i class="fa fa-phone margin-r-5 text-green"></i>
											Số điện thoại: 
											<span class="text-muted"><a class="pull-right">
												{{$customer->phone}}
											</a></span>
										</li>
										<li class="list-group-item">
											<i class="fa fa-envelope margin-r-5 text-red"></i>
											Email: 
											<span class="text-muted"><a class="pull-right">
												{{$customer->phone}}
											</a></span>
										</li>
										<li class="list-group-item">
											<i class="fa fa-address-book-o margin-r-5 text-blue"></i>
											Địa chỉ: 
											<span class="text-muted"><a class="pull-right">
												{{$customer->address}}
											</a></span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="images">
					<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt doloribus vel quos asperiores neque, at ratione nesciunt blanditiis deserunt illo rem esse nulla unde adipisci assumenda eius, culpa debitis! Nam!</div>
					<div>Molestiae ullam corporis voluptas esse inventore, est nulla? Saepe a, laudantium fugiat similique esse nostrum quod sunt, animi aperiam natus autem tenetur eum magnam eligendi quo dignissimos. A, consequatur. Sed.</div>
					<div>Provident beatae libero eius deleniti, illo facere dolore, in magnam. Architecto minima odio cumque maiores pariatur quis itaque et quo a neque, ducimus commodi magni, reiciendis repellendus adipisci eveniet obcaecati.</div>
					<div>Sequi nostrum, nobis dolor consequuntur molestias, facilis! Beatae rem deleniti, quam neque quidem, fugiat autem corrupti omnis at saepe quod ipsum non, aperiam quia aliquid fugit tempora voluptatum veritatis obcaecati?</div>
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