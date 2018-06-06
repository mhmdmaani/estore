@extends('layouts.app')

@section('content')
<div class="container">
<section>
    <div class="row">
        <div class="col col-md-4">
            <div class="imgCont">
            @if($user->image==null)
             <img src="/storage/images/defaultuser.png">
            @else
            <img src="/storage/images/{{$user->image}}">
            @endif            
            </div>
        </div>
        <div class="col col-md-8">
            <div class="userInfo">
            <h3 class="text-center">{{$user->name}}</h3>
            <h6>{{$user->email}}</h6>
            <h6>{{$user->tel}}</h6>
            <h6>
                @if($user->is_active==1)
                    <button class="btn btn-success">Active</button>
                    @else
                    <button class="btn btn-secondary">Not active</button>
                    @endif
            </h6>
            <h6>{{$user->email}}</h6>
            </div>
        </div>
    </div>
    <br/>
</section>
<section>
        @if($user->categories()->count()>0)
    <h2 class="text-center">Favorite Categories</h2>
    <div class="row">
      
        @foreach($user->categories() as $cat)
<!--Start looping favorite categories template-->
<div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="images/home/product3.jpg" alt="">
              @if($cat->products()!=null)
                <h2>{{$cat->products()->get()->count()}}</h2>
                @endif
              <p>{{$cat->name}}</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-delete"></i>delete favorite</a>
            </div>
            <div class="product-overlay">
              <div class="overlay-content">
                  @if($cat->products()!=null)
                <h2>{{$cat->products()->get()->count()}}</h2>
                @endif
                <p>{{$cat->name}}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-delete"></i>delete favorite</a>
              </div>
            </div>
          </div>
          <div class="choose">
            <ul class="nav nav-pills nav-justified">
              <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
              <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
          </div>
        </div>
      </div>
<!--end looping favorite categories template-->
        @endforeach
    </div>
    @endif
</section>
<h2 class="text-center">Your products</h2>
<section>
    <div class="row">
       @foreach($user->products()->get() as $pro)
        <!--Sart product template-->
        <div class="col-sm-4">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                    <img src="/storage/images/{{$pro->media()->first()->path}}" alt="">
                    <h2>{{$pro->price}}</h2>
                      <p>{{$pro->name}}</p>
                      @if($pro->is_sold==0)
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mark as sold</a>
                      @else
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mark as unsold</a>                      
                      @endif
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <h2>{{$pro->price}}</h2>
                        <p>{{$pro->description}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mark as sold</a>
                      </div>
                    </div>
                  </div>
                  <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                    <li><a href="/prochats/{{$pro->id}}"><i class="fa fa-comments"></i>Chats</a></li>
                      <li><a href="#"><i class="fa fa-plus-square"></i>Edit</a></li>
                    </ul>
                  </div>
                </div>
              </div>        
        <!--End product template-->
       @endforeach
    </div>
</section>
</div>
@endsection
