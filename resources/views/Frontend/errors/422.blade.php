@extends('Frontend.layouts.main')
@section('title','Lỗi')
@section('content')
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1 class="text-warning text-center">{{$message}}</h1>
		</div>
	</div>
</div>
@stop()