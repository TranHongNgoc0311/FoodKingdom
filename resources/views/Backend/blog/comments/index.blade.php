@extends('Backend.layout')
@section('title','Quản lý bình luận')
@section('content')
<div class="container-fluid" style="background-color: #F4E9E9;">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Blog</th>
				<th>Lượt bình luận</th>
				<th>Chưa phê duyệt</th>
				<th>Đã phê duyệt</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($blog as $b)
			@if(count($b->comments) > 0)
			<tr>
				<td width="45%">
					<div class="media">
						<a class="pull-left" href="{{route('Blog.show',['id' => $b->id])}}">
							<img class="media-object" src="{{url('public/images/blog/'.$b->image)}}" width="90px" height="60px" alt="hình minh họa {{$b->title}}">
						</a>
						<div class="media-body">
							<h4 class="media-heading">{{$b->title}}</h4>
							<span class="text-muted">Người viết: {{$b->user->name}}</span><br>
							<span class="text-muted">{{date('d-m-Y s:m:h',strtotime($b->updated_at))}}</span>
						</div>
					</div>
				</td>
				<td><span class="label label-info">{{count($b->comments)}}</span></td>
				<td><span class="label label-warning">{{$b->comments->where('status',0)->count()}}</span></td>
				<td><span class="label label-success">{{$b->comments->where('status',1)->count()}}</span></td>
				<td>
					<a href="{{route('Comments.show',['id' => $b->id])}}" title="chi tiết" class="btn btn-info btn-sm">
						<i class="fa fa-commenting-o"></i>
					</a>
				</td>
			</tr>
			@endif
			@endforeach
		</tbody>
	</table>
</div>
@stop()