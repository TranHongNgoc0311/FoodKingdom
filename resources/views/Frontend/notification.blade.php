@extends('Frontend.layouts.main')
@section('title','Thông báo')
@section('content')
{{Session::get('message')}}
@stop()