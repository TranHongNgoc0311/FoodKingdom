@extends('Backend.layout')
@section('title','Danh sách blog')
@section('content')
<div class="container-fluid" style="background-color: #F4E9E9;">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Blog</th>
				<th>Người viết</th>
				<th>Trạng thái</th>
				<th>Ngày đăng</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($blog as $b)
			<tr>
				<td width="45%">
					<div class="media">
						<a class="pull-left" href="{{route('Blog.show',['id' => $b->id])}}">
							<img class="media-object" src="{{url('public/images/blog/'.$b->image)}}" width="90px" height="60px" alt="hình minh họa {{$b->title}}">
						</a>
						<div class="media-body">
							<h4 class="media-heading">{{$b->title}}</h4>
							<p>{!! substr(strip_tags($b->content),0,140) !!}...</p>
						</div>
					</div>
				</td>
				<td>{{$b->user->name}}</td>
				<td>
					@if($b->status == 1)
					<span class="label label-info">Đăng</span>
					@else
					<span class="label label-danger">Ẩn</span>
					@endif
				</td>
				<td>{{date('d-m-Y s:m:h',strtotime($b->updated_at))}}</td>
				<td>
					<form action="{{route('Blog.destroy',['id' => $b->id])}}" method="POST">
						@csrf
						@method('DELETE')
						<button onclick="return confirm('Bạn chắc chắn rằng bạn muốn xóa?')" class="btn btn-danger btn-sm">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
						<a href="{{route('Blog.edit',['id' => $b->id])}}" class="btn btn-warning btn-sm">
							<i class="glyphicon glyphicon-edit"></i>
						</a>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop()