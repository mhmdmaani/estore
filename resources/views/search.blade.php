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
   <label for="cat">search:</label>
   <select class="form-control"
            name="category" id="cat">
   <option value="0" >All</option>
   @foreach($categories as $cat)
       <option value="{{$cat->id}}" >
           {{$cat->name}}
       </option>
   @endforeach
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
    <h2 class="title text-center">Search results</h2>
    @foreach($products as $latestPro)
    <div class="col-sm-4 col-md-3">
      <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
              <img src="/storage/images/{{$latestPro->media()->first()->path}}" alt="" />
              <h2>{{$latestPro->price}} {{$latestPro->curr->name}}</h2>
              <p>{{$latestPro->name}}</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-comments"></i>Details</a>
            </div>
            <div class="product-overlay">
              <div class="overlay-content">
                <h2>{{$latestPro->price}} {{$latestPro->curr->name}}</h2>
                <p>{{$latestPro->name}}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-comments"></i>Details</a>
              </div>
            </div>
        </div>
        <div class="choose">
          <ul class="nav nav-pills nav-justified">
            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
          </ul>
        </div>
      </div>
    </div>
    @endforeach
  </div><!--features_items-->
</div>
</section><!--Results-->
{{$products->render()}}
</div>
@endsection
