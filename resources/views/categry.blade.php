@extends('layouts.app')

@section('content')
<div class="container">
<section class="text-center"><!--Search options-->
  <form method="get" action="/homesearch" class="form-inline" style="margin:10px">
  <div class="form-group">
    <label for="item">search:</label>
    <input class="form-control" name="itemName" id="item">
 </div>
 <div class="form-group">
   <label for="cat">Category:</label>
   <select class="form-control"
            name="category" id="cat">
       <option value="{{$category->id}}" >
           {{$category->name}}
       </option>
   </select>
</div>
<div class="form-group">
  <label for="crr">Currency:</label>
  <select class="form-control"
           name="currency" id="crr">
           <option value="0">
                  All
            </option>
  @foreach($currs as $curr)
      <option value="{{$curr->id}}">
           {{$curr->name}}
      </option>
  @endforeach
  </select>
</div>
<div class="form-group">
 <label for="plc">search:</label>
 <select class="form-control"
        name="place" id="plc">
        <option value="0">All</option>
 @foreach($places as $place)
    <option value="{{$place->id}}">
        {{$place->name}}
    </option>
 @endforeach
</select>
</div>
<input type="submit" value="Search" class="btn btn-success" >
</form>
</section>
<section><!--Results-->
  <div class="row">
  <div class="features_items"><!--features_items-->
    <h2 class="title text-center">{{$category->name}} Items</h2>
    @foreach($products as $latestPro)
    <div class="col-sm-4">
      <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
              <img src="/storage/images/{{$latestPro->media()->first()->path}}" alt="" />
              <h2>{{$latestPro->price}} {{$latestPro->curr->name}}</h2>
              <p>{{$latestPro->name}}</p>
              <a href="/item/{{$latestPro->id}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
            </div>
            <div class="product-overlay">
              <div class="overlay-content">
                <h3><i class="fa fa-map-marker"></i> {{$latestPro->place->name}}</h3>
                <h2>{{$latestPro->price}} {{$latestPro->curr->name}}</h2>
                <p>{{$latestPro->name}}</p>
                <a href="/item/{{$latestPro->id}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
              </div>
            </div>
        </div>
        <div class="choose">
          <ul class="nav nav-pills nav-justified">
            <li>
            @if(auth::user())
              @if($latestPro->favusers()->wherePivot('user_id','=',auth::user()->id)->count()==0)
              <form method="post" action="" class="text-center">
                {{ csrf_field() }}
                <input type="hidden" name="productID" value="{{$latestPro->id}}" >
              <button class="addFav btn btn-primary "><i class="fa fa-star"></i> <span class="btntxt">Add to favorite</span></button>
             </form>
              @else
              <form method="post" action="">
                {{ csrf_field() }}
                <input type="hidden" name="productID" value="{{$latestPro->id}}" >
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
{{$products->render()}}
</div>
@endsection
