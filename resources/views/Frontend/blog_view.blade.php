@extends('Frontend.layouts.main')
@section('title',$blog->title)
@section('style')
<style>
  .blog-status{
    line-height: 0;
  }
</style>
@stop('style')
@section('content')
<section class="home-slider owl-carousel img" style="background-image: url({{url('public/images/bg_1.jpg')}});">

  <div class="slider-item" style="background-image: url({{url('public/images/bg_3.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">{{$blog->title}}</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span> 
            <span class="mr-2"><a href="{{route('blog.index')}}">Blog</a></span> 
            <span>Blog Single</span>
          </p>
        </div>

      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ftco-animate">
        <h2 class="mb-3">{{$blog->title}}</h2>
        <div class="blog-status">
          <p><i class="fa fa-pencil"></i> <small class="text-muted">Editer: 
          @foreach($blog->editer as $edit)
          {{$edit->user->name}}{{(count($blog->editer) > 1)?', ':'.'}}
          @endforeach
        </small></p>
        <p><i class="fa fa-eye"></i> <small class="text-muted">{{$blog->view}}</small></p>
        </div>
        <div class="content">
          {!!$blog->content!!}
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
            <img src="{{url('public/images/users/'.Auth::user()->avatar)}}" alt="Image placeholder" class="img-fluid mb-4">
          </div>
          <div class="desc align-self-md-center">
            <h3>{{$blog->user->name}}</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div>


        <div class="pt-5 mt-5">
          <h3 class="mb-5">{{(count($comments) > 0)? count($comments).' Bình luận':''}}</h3>
          <ul class="comment-list">
            @foreach($comments as $cmt)
            @if($cmt->status == 1)
            <li class="comment">
              <div class="vcard bio">
                <img src="{{url('public/images/customers/'.$cmt->customer->avatar)}}" alt="Khách hàng">
              </div>
              <div class="comment-body">
                <h3>{{$cmt->customer->name}}</h3>
                <div class="meta">
                  {{date('M d,Y',strtotime($cmt->created_at))}} at {{date('H:ma',strtotime($cmt->created_at))}}
                </div>
                <p>{{$cmt->content}}</p>
                <p><a href="#" class="reply">Reply</a></p>
              </div>
            </li>
            @endif
            @endforeach
            <!-- <li class="comment">
              <div class="vcard bio">
                <img src="{{url('public/images/person_1.jpg')}}" alt="Image placeholder">
              </div>
              <div class="comment-body">
                <h3>John Doe</h3>
                <div class="meta">June 27, 2018 at 2:21pm</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                <p><a href="#" class="reply">Reply</a></p>
              </div>
            
              <ul class="children">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{url('public/images/person_1.jpg')}}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta">June 27, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply">Reply</a></p>
                  </div>
            
            
                  <ul class="children">
                    <li class="comment">
                      <div class="vcard bio">
                        <img src="{{url('public/images/person_1.jpg')}}" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>John Doe</h3>
                        <div class="meta">June 27, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply">Reply</a></p>
                      </div>
            
                      <ul class="children">
                        <li class="comment">
                          <div class="vcard bio">
                            <img src="{{url('public/images/person_1.jpg')}}" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta">June 27, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li> -->
          </ul>
          <!-- END comment-list -->

          @if(!empty(Auth::guard('customer')->user()))
          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Để lại bình luận</h3>
            <form action="{{route('Custom_comment.store')}}" method="POST">
              @csrf
              <input type="hidden" name="blog_id" value="{{$blog->id}}">
              <div class="form-group">
                <label for="message">Nội dung</label>
                <textarea name="content" id="message" rows="4" class="form-control"></textarea>
                @if($errors->has('content'))
                <div class="help-block">
                  {{$errors->first('content')}}
                </div>
                @endif
              </div>
              <div class="form-group">
                <input type="submit" value="Đăng bình luận" class="btn py-3 px-4 btn-primary">
              </div>

            </form>
          </div>
          @else
          <div class="panel panel-default">
            <div class="panel-body text-center">
              <p class="text-muted">Để có thể bình luận, vui lòng đăng nhập.</p>
              <a href="{{route('sign_in')}}" class="btn btn-lg btn-info">Đăng nhập</a>
            </div>
          </div>
          @endif
        </div>

      </div> <!-- .col-md-8 -->
      <div class="col-md-4 sidebar ftco-animate">
        <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <div class="icon">
                <span class="icon-search"></span>
              </div>
              <input type="text" class="form-control" placeholder="Search...">
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
          <div class="categories">
            <h3>Categories</h3>
            <li><a href="#">Tour <span>(12)</span></a></li>
            <li><a href="#">Hotel <span>(22)</span></a></li>
            <li><a href="#">Coffee <span>(37)</span></a></li>
            <li><a href="#">Drinks <span>(42)</span></a></li>
            <li><a href="#">Foods <span>(14)</span></a></li>
            <li><a href="#">Travel <span>(140)</span></a></li>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Recent Blog</h3>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{url('public/images/image_1.jpg')}});"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{url('public/images/image_2.jpg')}});"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{url('public/images/image_3.jpg')}});"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Tag Cloud</h3>
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">dish</a>
            <a href="#" class="tag-cloud-link">menu</a>
            <a href="#" class="tag-cloud-link">food</a>
            <a href="#" class="tag-cloud-link">sweet</a>
            <a href="#" class="tag-cloud-link">tasty</a>
            <a href="#" class="tag-cloud-link">delicious</a>
            <a href="#" class="tag-cloud-link">desserts</a>
            <a href="#" class="tag-cloud-link">drinks</a>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Paragraph</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
        </div>
      </div>

    </div>
  </div>
</section> <!-- .section -->
@stop()