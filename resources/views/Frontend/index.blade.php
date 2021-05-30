@extends('Frontend.layouts.main')
@section('title','Trang chủ')
@section('content')

<section class="home-slider owl-carousel img" style="background-image: url({{url('public/images/bg_1.jpg')}});">
  <div class="slider-item">
   <div class="overlay"></div>
   <div class="container">
    <div class="row slider-text align-items-center" data-scrollax-parent="true">

      <div class="col-md-6 col-sm-12 ftco-animate">
       <span class="subheading">Delicious</span>
       <h1 class="mb-4">Italian Cuizine</h1>
       <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
       <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
     </div>
     <div class="col-md-6 ftco-animate">
       <img src="{{url('public/images/bg_1.png')}}" class="img-fluid" alt="">
     </div>

   </div>
 </div>
</div>

<div class="slider-item">
 <div class="overlay"></div>
 <div class="container">
  <div class="row slider-text align-items-center" data-scrollax-parent="true">

    <div class="col-md-6 col-sm-12 order-md-last ftco-animate">
     <span class="subheading">Crunchy</span>
     <h1 class="mb-4">Italian Pizza</h1>
     <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
     <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
   </div>
   <div class="col-md-6 ftco-animate">
     <img src="{{url('public/images/bg_2.png')}}" class="img-fluid" alt="">
   </div>

 </div>
</div>
</div>

<div class="slider-item" style="background-image: url({{url('public/images/bg_3.jpg')}});">
 <div class="overlay"></div>
 <div class="container">
  <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

    <div class="col-md-7 col-sm-12 text-center ftco-animate">
     <span class="subheading">Welcome</span>
     <h1 class="mb-4">We cooked your desired Pizza Recipe</h1>
     <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
     <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
   </div>

 </div>
</div>
</div>
</section>

<section class="ftco-intro">
 <div class="container-wrap">
  <div class="wrap d-md-flex">
   <div class="info">
    <div class="row no-gutters">
     <div class="col-md-4 d-flex ftco-animate">
      <div class="icon"><span class="icon-phone"></span></div>
      <div class="text">
       <h3>0363311904</h3>
       <p>Một cây hoa anh đào lớn</p>
     </div>
   </div>
   <div class="col-md-4 d-flex ftco-animate">
    <div class="icon"><span class="icon-my_location"></span></div>
    <div class="text">
     <h3>Số 127 Thái Hà - Hà Nội</h3>
     <p>Đối diện khách sạn Giant Beer</p>
   </div>
 </div>
 <div class="col-md-4 d-flex ftco-animate">
  <div class="icon"><span class="icon-clock-o"></span></div>
  <div class="text">
   <h3>Mở tất cả các ngày trong tuần</h3>
   <p>8:00am - 11:00pm</p>
 </div>
</div>
</div>
</div>
<div class="social d-md-flex pl-md-5 p-4 align-items-center">
  <ul class="social-icon">
    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
  </ul>
</div>
</div>
</div>
</section>

<section class="ftco-about d-md-flex">
 <div class="one-half img" style="background-image: url({{url('public/images/about.jpg')}});"></div>
 <div class="one-half ftco-animate">
  <div class="heading-section ftco-animate text-center">
    <h2 class="mb-4">Chào mừng đến với nhà hàng <p><span class="flaticon-chef">Food - Kingdom</span></p></h2>
  </div>
  <div>
    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
  </div>
</div>
</section>

<section class="ftco-section ftco-services">
 <div class="overlay"></div>
 <div class="container">
  <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
      <h2 class="mb-4">Phương châm của nhà hàng</h2>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 ftco-animate">
      <div class="media d-block text-center block-6 services">
        <div class="icon d-flex justify-content-center align-items-center mb-5">
         <span class="flaticon-laugh"></span>
       </div>
       <div class="media-body">
        <h3 class="heading">Đáp ứng vị giác của bạn là nhiệm vụ của chúng tôi.</h3>
        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
      </div>
    </div>      
  </div>
  <div class="col-md-4 ftco-animate">
    <div class="media d-block text-center block-6 services">
      <div class="icon d-flex justify-content-center align-items-center mb-5">
       <span class="flaticon-diet"></span>
     </div>
     <div class="media-body">
      <h3 class="heading">Không ngừng phát triển menu nhà hàng</h3>
      <p>Luôn mang đến những món ăn đến cả những người khó tính cũng phải thổn thức.</p>
    </div>
  </div>      
</div>
<div class="col-md-4 ftco-animate">
  <div class="media d-block text-center block-6 services">
    <div class="icon d-flex justify-content-center align-items-center mb-5"><span class="flaticon-bicycle"></span></div>
    <div class="media-body">
      <h3 class="heading">Không ngừng cải tiến chất lượng dịch vụ.</h3>
      <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
    </div>
  </div>    
</div>
</div>
</div>
</section>

<section class="ftco-section">
 <div class="container">
  <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section ftco-animate text-center">
      <h2 class="mb-4">Món mới</h2>
      <p>Các món ăn mới không ngừng được nhà hàng Food - Kingdom cập nhập vào thực đơn.</p>
    </div>
  </div>
</div>
<div class="container-wrap">
  <div class="row no-gutters d-flex">
    @for($i = 0;$i < 6;$i++)
    @if($menu->count() > $i)
    @if($i < 3)
    <div class="col-lg-4 d-flex ftco-animate">
      <div class="services-wrap d-flex">
        <a href="#" class="img" style="background-image: url({{url('public/images/products/'.$menu[$i]->image)}});"></a>
        <div class="text p-4">
          <h3>{{$menu[$i]->name}}</h3>
          <p>{{substr($menu[$i]->description, 0 ,100)}}</p>
          <p class="price"><span>{{$menu[$i]->price}}</span> <a href="{{route('service.index')}}" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
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
      <h2 class="mb-4">Các món nổi bật</h2>
      <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
      <p class="mt-5">Được chọn lọc từ 1000 món ăn trên thế giới bởi bếp trưởng Steve Borlen, trong hành trình nghiên cứu ẩm thực thế giới trong 30 năm của ông..
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      @for($i = 0;$i < 4;$i++)
      @if($menu->count() > $i)
      <div class="pricing-entry d-flex ftco-animate">
        <div class="img" style="background-image: url({{url('public/images/products/'.$menu[$i]->image)}});"></div>
        <div class="desc pl-3">
          <div class="d-flex text align-items-center">
            <h3><span>{{$menu[$i]->name}}</span></h3>
            <span class="price">{{$menu[$i]->price}}</span>
          </div>
          <div class="d-block">
            <p>{{substr($menu[$i]->description,0,60)}}</p>
          </div>
        </div>
      </div>
      @endif
      @endfor
    </div>
    <div class="col-md-6">
      @for($i = 4;$i < 8;$i++)
      @if($menu->count() > $i)
      <div class="pricing-entry d-flex ftco-animate">
        <div class="img" style="background-image: url({{url('public/images/products/'.$menu[$i]->image)}});"></div>
        <div class="desc pl-3">
          <div class="d-flex text align-items-center">
            <h3><span>{{$menu[$i]->name}}</span></h3>
            <span class="price">{{$menu[$i]->price}}</span>
          </div>
          <div class="d-block">
            <p>{{substr($menu[$i]->description,0,60)}}</p>
          </div>
        </div>
      </div>
      @endif
      @endfor
    </div>
  </div>
</div>
</section>

<section class="ftco-gallery">
 <div class="container-wrap">
  <div class="row no-gutters">
   <div class="col-md-3 ftco-animate">
    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{url('public/images/gallery-1.jpg')}});">
     <div class="icon mb-4 d-flex align-items-center justify-content-center">
      <span class="icon-search"></span>
    </div>
  </a>
</div>
<div class="col-md-3 ftco-animate">
  <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{url('public/images/gallery-2.jpg')}});">
   <div class="icon mb-4 d-flex align-items-center justify-content-center">
    <span class="icon-search"></span>
  </div>
</a>
</div>
<div class="col-md-3 ftco-animate">
  <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{url('public/images/gallery-3.jpg')}});">
   <div class="icon mb-4 d-flex align-items-center justify-content-center">
    <span class="icon-search"></span>
  </div>
</a>
</div>
<div class="col-md-3 ftco-animate">
  <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{url('public/images/gallery-4.jpg')}});">
   <div class="icon mb-4 d-flex align-items-center justify-content-center">
    <span class="icon-search"></span>
  </div>
</a>
</div>
</div>
</div>
</section>


<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{url('public/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
 <div class="overlay"></div>
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-10">
    <div class="row">
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center">
          <div class="text">
           <div class="icon"><span class="flaticon-pizza-1"></span></div>
           <strong class="number" data-number="{{count($menu)}}">0</strong>
           <span>Món ăn</span>
         </div>
       </div>
     </div>
     <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
      <div class="block-18 text-center">
        <div class="text">
         <div class="icon"><span class="flaticon-medal"></span></div>
         <strong class="number" data-number="85">0</strong>
         <span>Number of Awards</span>
       </div>
     </div>
   </div>
   <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
    <div class="block-18 text-center">
      <div class="text">
       <div class="icon"><span class="flaticon-laugh"></span></div>
       <strong class="number" data-number="10567">0</strong>
       <span>Khách hàng</span>
     </div>
   </div>
 </div>
 <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
  <div class="block-18 text-center">
    <div class="text">
     <div class="icon"><span class="flaticon-chef"></span></div>
     <strong class="number" data-number="900">0</strong>
     <span>Đầu bếp</span>
   </div>
 </div>
</div>
</div>
</div>
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
          @if($category->count() > 0)
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
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h2 class="mb-2">Tin mới</h2>
        <p>Cập nhật tin mới nhất nhất từ trước tới nay.</p>
        <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
      </div>
    </div>
    <div class="row d-flex">
      @if($blog->count() > 0)
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
            <p>{!! substr(strip_tags($b->content),0,150) !!}...</p>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</section>


<section class="ftco-appointment">
 <div class="overlay"></div>
 <div class="container-wrap">
  <div class="row no-gutters d-md-flex align-items-center">
   <div class="col-md-6 d-flex align-self-stretch">
    <div id="map"></div>
  </div>
  <div class="col-md-6 appointment ftco-animate">
    <h3 class="mb-3">liên hệ với chúng tôi</h3>
    <form action="#" class="appointment-form">
      <div class="row">
       <div class="col-md-6 d-md-flex">
        <div class="form-group">
         <input type="text" class="form-control" placeholder="Họ">
       </div>
     </div>
     <div class="col-md-6 d-me-flex">
      <div class="form-group">
       <input type="text" class="form-control" placeholder="Tên">
     </div>
   </div>
 </div>
 <div class="d-me-flex">
  <div class="form-group">
   <input type="text" class="form-control" placeholder="Email">
 </div>
</div>
<div class="form-group">
 <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Nội dung"></textarea>
</div>
<div class="form-group">
 <input type="submit" value="Gửi" class="btn btn-primary py-3 px-4">
</div>
</form>
</div>          
</div>
</div>
</section>
@stop()