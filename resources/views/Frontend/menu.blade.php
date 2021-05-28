@extends('Frontend.layouts.main')
@section('title','Menu')
@section('content')
<section class="home-slider owl-carousel img" style="background-image: url({{url('public/images/bg_1.jpg')}});">

  <div class="slider-item" style="background-image: url({{url('public/images/bg_3.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Menu của chúng tôi</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home</a></span> <span>Menu</span></p>
        </div>

    </div>
</div>
</div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Thực đơn của chúng tôi</h2>
            <p>Được chọn lọc từ 1000 món ăn trên thế giới bởi bếp trưởng Steve Borlen, trong hành trình nghiên cứu ẩm thực thế giới trong 30 năm của ông..
            </p>
        </div>
    </div>
</div>
<div class="container-wrap">
    <div class="row no-gutters d-flex">
        @for($i = 0;$i < 6;$i++)
        @if($i < $menu->count())
        @if($i % 2 == 0)
        <div class="col-lg-4 d-flex ftco-animate">
            <div class="services-wrap d-flex">
                <a href="#" class="img" style="background-image: url({{url('public/images/products/'.$menu[$i]->image)}});"></a>
                <div class="text p-4">
                    <h3>{{$menu[$i]->name}}</h3>
                    <p>{{substr($menu[$i]->description, 0 ,100)}}</p>
                    <p class="price"><span>{{$menu[$i]->price}}</span> <a href="#" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-4 d-flex ftco-animate">
            <div class="services-wrap d-flex">
                <a href="#" class="img order-lg-last" style="background-image: url({{url('public/images/products/'.$menu[$i]->image)}});"></a>
                <div class="text p-4">
                    <h3>{{$menu[$i]->name}}</h3>
                    <p>{{substr($menu[$i]->description, 0 ,100)}}</p>
                    <p class="price"><span>{{$menu[$i]->price}}</span> <a href="#" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                </div>
            </div>
        </div>
        @endif
        @endif
        @endfor
    </div>
</div>

<div class="container">
    <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2 class="mb-4">Chi tiết thực đơn</h2>
        <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
        <p class="mt-5">Được chọn lọc từ 1000 món ăn trên thế giới bởi bếp trưởng Steve Borlen, trong hành trình nghiên cứu ẩm thực thế giới trong 30 năm của ông..
        </p>
    </div>
</div>
<div class="row">
    @for($i = 0;$i < count($category);$i++)
    @if($i % 2 == 0)
    <div class="col-md-6">
        <div class="heading-section text-center ftco-animate">
            <h4 class="mb-4">{{$category[$i]->name}}</h4>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
        </div>
        @foreach($category[$i]->product as $cat_menu)
        <div class="pricing-entry d-flex ftco-animate">
            <div class="img" style="background-image: url({{url('public/images/products/'.$cat_menu->image)}});"></div>
            <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                    <h3><span>{{$cat_menu->name}}</span></h3>
                    <span class="price">{{$cat_menu->price}}</span>
                </div>
                <div class="d-block">
                    <p>{{substr($cat_menu->description,0,65)}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="col-md-6">
        <div class="heading-section text-center ftco-animate">
            <h4 class="mb-4">{{$category[$i]->name}}</h4>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
        </div>
        @foreach($category[$i]->product as $cat_menu)
        <div class="pricing-entry d-flex ftco-animate">
            <div class="img" style="background-image: url({{url('public/images/products/'.$cat_menu->image)}});"></div>
            <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                    <h3><span>{{$cat_menu->name}}</span></h3>
                    <span class="price">{{$cat_menu->price}}</span>
                </div>
                <div class="d-block">
                    <p>{{substr($cat_menu->description,0,65)}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    @endfor
</div>
</div>
</section>

<section class="ftco-menu">
    <div class="container-fluid">
        <div class="row d-md-flex">
            <div class="col-lg-4 ftco-animate img f-menu-img mb-5 mb-md-0" style="background-image: url({{url('public/images/about.jpg')}});">
            </div>
            <div class="col-lg-8 ftco-animate p-md-5">
                <div class="row">
                  <div class="col-md-12 nav-link-wrap mb-5">
                    <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @for($i = 0;$i < count($category);$i++)
                        <a class="nav-link {{($i == 0)?'active':''}}" style="margin-bottom: 5px;" id="v-pills-{{$i}}-tab" data-toggle="pill" href="#v-pills-{{$i}}" role="tab" aria-controls="v-pills-{{$i}}" aria-selected="{{($i == 0)?'true':'false'}}">{{$category[$i]->name}}</a>
                        @endfor
                    </div>
                </div>
                <div class="col-md-12 d-flex align-items-center">

                    <div class="tab-content ftco-animate" id="v-pills-tabContent">
                        @for($i = 0;$i < count($category);$i++)
                        <div class="tab-pane fade {{($i == 0)?'show active':''}}" id="v-pills-{{$i}}" role="tabpanel" aria-labelledby="v-pills-{{$i}}-tab">
                            @if(count($category[$i]->product) > 0)
                            <div class="row" style="max-width: 100%;overflow: auto;max-height: 425px;">
                              @foreach($category[$i]->product as $cat_menu)
                              <div class="col-md-4 text-center">
                                <div class="menu-wrap">
                                  <a href="#" class="menu-img img mb-4" style="background-image: url({{url('public/images/products/'.$cat_menu->image)}});"></a>
                                  <div class="text">
                                    <h3><a href="#">{{$cat_menu->name}}</a></h3>
                                    <p>{{substr($cat_menu->description,0,50)}}</p>
                                    <p class="price"><span>{{$cat_menu->price}}</span></p>
                                    <p><a href="#" class="btn btn-white btn-outline-white">Add to cart</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="container-fluid" style="max-width: 100%;max-height: 425px;">
                      <h1>Updating...</h1>
                  </div>
                  @endif
              </div>
              @endfor
          </div>
      </div>
  </div>
</div>
</div>
</div>
</section>
@stop()