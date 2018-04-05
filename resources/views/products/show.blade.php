@extends('layouts.app')

@section('content')
<div class="container">
  <div style="width: 70% ; margin:10px auto">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach($product->media()->get() as $k=> $m)
       @if($m==$product->media()->first())
    <li data-target="#myCarousel" data-slide-to="{{$k}}" class="active"></li>
    @else
    <li data-target="#myCarousel" data-slide-to="{{$k}}"></li>
    @endif
    @endforeach
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @foreach($product->media()->get() as $key=>$media)
     @if($media==$product->media()->first())
    <div class="item active">
       <div class="item">
        <div style="width: 100% ; height:500px;background:#333;overflow: hidden;">
      <img src="/storage/images/{{$media->path}}" alt="" style="width: 100%; max-height: 500px">
    </div>
    </div>
  </div>    
    @else
      <div class="item">
        <div style="width: 100% ; height:500px;background:#333;overflow: hidden;margin: auto">
      <img src="/storage/images/{{$media->path}}" alt="Los Angeles" style="max-width: 100%; max-height: 100%">
    </div>
    </div>
    @endif
@endforeach
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
   <i class="fa fa-arrow-left" style="margin-top: 200px"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <i class="fa fa-arrow-right" style="margin-top: 200px"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="row proCont">
    <h3 class=" proName text-center">{{$product->name}}</h3>
    <div class="col col-md-6">
      <div class="proInfo">
             <p class="price"><span>{{$product->price}}</span>  {{$product->curr->name}}</p>
            <h5>City:   <span>{{$product->place->name}}</span></h5>
            <h5>published at:  <span>{{$product->created_at}}</span></h5>
            <h6>{{$product->description}}</h6>
            <h5>published by:  <span>{{$product->user->name}}</span></h5>
            <h5>Category:  <button class="btn btn-success">{{$product->category->name}}</button></h5>
            <h5>Tags:</h5>
            <p>
            @foreach($product->tags()->get() as $tag)
               <button class="btn btn-primary btn-sm">{{$tag->name}}</button>
            @endforeach
          </p>
      </div>
  </div>
  <div class="col col-md-6">

  </div>
</div>
@endsection