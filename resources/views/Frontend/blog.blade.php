@extends('Frontend.layouts.main')
@section('title','Blog')
@section('content')
<section class="home-slider owl-carousel img" style="background-image: url({{url('public/images/bg_1.jpg')}});">

  <div class="slider-item" style="background-image: url({{url('public/images/bg_3.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Danh sách blog</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span> <span>Blog</span></p>
        </div>

      </div>
    </div>
  </div>
</section>


<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-4">Blog</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
    <div class="row d-flex">
      @foreach($blog as $b)
      <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch">
          <a href="{{route('blog.show',['slug' => $b->slug])}}" class="block-20" style="background-image: url({{url('public/images/blog/'.$b->image)}});background-size: cover;">
          </a>
          <div class="text py-4 d-block">
            <div class="meta">
              <div><a href="#">{{date('M d,Y',strtotime($b->created_at))}}</a></div>
              <div><a href="#">{{$b->user->name}}</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
            </div>
            <h3 class="heading mt-2">
              <a href="{{route('blog.show',['slug' => $b->slug])}}" title="{{$b->title}}">
                {{substr($b->title,0,40)}}{{ (strlen($b->title) > 40)?'...':'' }}
              </a>
            </h3>
            <p>{!! substr(strip_tags($b->content),0,250) !!}...</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@stop()