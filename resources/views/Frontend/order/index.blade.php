@extends('Frontend.layouts.main')
@section('title','Dịch vụ')
@section('content')
<section class="home-slider owl-carousel img" style="background-image: url({{url('public/images/bg_1.jpg')}});">

  <div class="slider-item" style="background-image: url({{url('public/images/bg_3.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Dịch vụ</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span> <span>Dịch vụ</span></p>
        </div>

    </div>
</div>
</div>
</section>


<section class="ftco-section ftco-services">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Services</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
    </div>
    <div class="row">
        @foreach($service as $sv)
        <div class="col-md-3 text-center ftco-animate">
            <div class="menu-wrap">
                <a href="{{route('service.show',['slug' => $sv->slug])}}" class="menu-img img mb-4" style="background-image: url({{url('public/images/service/'.$sv->image)}});"></a>
                <div class="text">
                    <h3><a href="#">{{$sv->name}}</a></h3>
                    <p>{{substr(strip_tags($sv->description),0,100)}}</p>
                    <p><span class="text-muted">{{$sv->price}} đ</span></p>
                    <p><a href="{{route('Cart.add',['id' => $sv->id])}}" class="btn btn-white btn-outline-white">ĐẶT DỊCH VỤ</a></p>
                </div>
            </div>
        </div>
        @endforeach    
    </div>
</div>
</section>

@stop()