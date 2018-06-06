@extends('layouts.app')
@section('content')
@foreach(Auth::user()->products()->get() as $pro)
<div class="col-sm-4">
  <div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
          <img src="/storage/images/{{$pro->media()->first()->path}}" alt="" />
          <h2>{{$pro->price}} {{$pro->curr->name}}</h2>
          <p>{{$pro->name}}</p>
          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
        </div>
        <div class="product-overlay">
          <div class="overlay-content">
            <h3><i class="fa fa-map-marker"></i> {{$pro->place->name}}</h3>
            <h2>{{$pro->price}} {{$pro->curr->name}}</h2>
            <p>{{$pro->name}}</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
          </div>
        </div>
    </div>
    <div class="choose">
      <ul class="nav nav-pills nav-justified">
        <li>
        @if(auth::user())
          @if($pro->favusers()->wherePivot('user_id','=',auth::user()->id)->count()==0)
          <form method="post" action="" class="text-center">
            {{ csrf_field() }}
            <input type="hidden" name="productID" value="{{$pro->id}}" >
          <button class="addFav btn btn-primary "><i class="fa fa-star"></i> <span class="btntxt">Add to favorite</span></button>
         </form>
          @else
          <form method="post" action="">
            {{ csrf_field() }}
            <input type="hidden" name="productID" value="{{$pro->id}}" >
          <button class="addFav btn btn-primary " ><i class="fa fa-check"></i><span class="btntxt"> Saved</span></button>
        </form>
          @endif
        @else
             <a href="/login}}" class="btn btn-primary" enable="false"><i class="fa fa-user"></i>login</a>
        @endif
        </li>
      </ul>
    </div>
  </div>
</div>
@endforeach
@endsection()
