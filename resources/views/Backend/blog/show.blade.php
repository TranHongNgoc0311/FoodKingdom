@extends('Backend.layout')
@section('title',$blog->title)
@section('style')
<style>
.about-author .desc h3 {
	font-size: 24px; 
}
.mb-3{
	margin-bottom: 1rem !important;
}
.mb-5{
	margin-bottom: 3rem !important; 
}
.mt-5{
	margin-top: 3rem !important;
}
.tagcloud a {
	text-transform: uppercase;
	display: inline-block;
	padding: 4px 10px;
	margin-bottom: 7px;
	margin-right: 4px;
	border-radius: 4px;
	color: #b3b3b3;
	border: 1px solid #bf7e06;
	font-size: 11px; 
}
.tagcloud a:hover {
	border: 1px solid #000; 
}
.about-author .desc h3 {
	font-size: 24px; 
}
.d-flex {
	display: -webkit-box !important;
	display: -ms-flexbox !important;
	display: flex !important; 
}
.align-self-md-center {
	-ms-flex-item-align: center !important;
	align-self: center !important; 
}
.mr-5{
	margin-right: 3rem !important; 
}
.img-fluid {
	max-width: 100%;
	height: auto; 
}
.mb-4{
	margin-bottom: 1.5rem !important; 
}
.bg{
	font-size: 15px;
	line-height: 1.8;
	font-weight: 300;
	color: gray;
	background: url({{url('public/images/bg/bg_4.jpg')}}) no-repeat fixed;
}
</style>
@stop('style')
@section('content')
<div class="container-fluid bg">
	<div class="col-md-8 col-md-offset-2">
		<h2 class="mb-3">{{$blog->title}}</h2>
		<div class="content">
			<div class="row">
				{!!$blog->content!!}
			</div>
		</div>
		<div class="tag-widget post-tag-container mb-5 mt-5">
			<div class="tagcloud">
				@foreach($blog->blog_tag as $b_tag)
				<a href="#" class="tag-cloud-link">{{$b_tag->tag->name}}</a>
				@endforeach
			</div>
		</div>

		<div class="about-author d-flex">
			<div class="bio align-self-md-center mr-5">
				<img src="{{url('public/images/users/'.$blog->user->avatar)}}" alt="{{$blog->user->name}}" class="img-fluid mb-4">
			</div>
			<div class="desc align-self-md-center">
				<h3>{{$blog->user->name}}</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
			</div>
		</div>
	</div>
</div>
@stop()