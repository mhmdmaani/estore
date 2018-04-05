@extends('layouts.app')

@section('content')
<div class="container">
<div class="panel panel-primary" style="margin:10px auto;width:75%">
  <div class="panel-heading text-center"> 
    Edit product  {{$product->name}}:
  </div>
  
      <div class="panel-body">
      <form method="post" action="{{route('products.update',[$product->id])}}" class="form"
      enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="{{$product->id}}">
            <div class="form-group">
                 <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$product->name}}">
            </div> 
            <div class="form-group">
                 <label>Discription</label>
                <textarea name="description" class="form-control">{{$product->description}}</textarea>
            </div> 
            <div class="form-group">
                 <label>price</label>
                <input type="text" name="price" class="form-control" value="{{$product->price}}">
            </div>
             <div class="form-group">
                 <label>Currency</label>
                <select class="form-control" name="currency">
                 @foreach($currs as $curr){
                    @if($product->curr_id==$curr->id)
                        <option value="{{$curr->id}}" selected="selected">{{$curr->name}}</option>
                    @else
                        <option value="{{$curr->id}}">{{$curr->name}}</option>
                    @endif                   
                @endforeach
                </select>
            </div>
             <div class="form-group">
                 <label>Category</label>
                 <select class="form-control" name="category">
                    @foreach($categories as $cat)
                        @if($product->category_id==$cat->id)
                            <option value="{{$cat->id}}" selected="selected">{{$cat->name}}</option>
                        @else
                            <option value="{{$cat->id}}">{{$cat->name}}</option>   
                        @endif   
                    @endforeach
                </select>
            </div>
             <div class="form-group">
                 <label>Place</label>
                 <select class="form-control" name="local">
                    @foreach($places as $place)
                        @if($product->place_id==$place->id)
                            <option value="{{$place->id}}" selected="selected">{{$place->name}}</option>
                        @else
                            <option value="{{$place->id}}">{{$place->name}}</option>
                        @endif
                    @endforeach
                </select>
             </div>
             <label>Tags</label>
            <div class="bs-example">
            <input name="tags" type="text" data-role="tagsinput" value="
           @foreach($product->tags()->get() as $tag)
             {{$tag->name}}
           @endforeach
            " />
            </div> 
             <div class="form-group" id="postreview">
            @foreach($product->media()->get() as $img)
          <div class="responsive">
              <div class="gallery">
                <a target="_blank" href="/storage/images/{{$img->path}}">
                  <img class="img img-thumbniel" src="/storage/images/{{$img->path}}" alt="" width="400" height="300">
              </a>
                    <div class="desc">
                        <button class="btn btn-danger btn-xs" type="button" onclick="
                                             var result = confirm('Do you sure to delete saved image??');
                                             if(result){
                                                 document.getElementById('deleteForm').submit();
                                             }
                                                      
                                             " >Delete</button> 
                          <form method="POST" id="deleteForm" action="{{ route('media.destroy',[$img->id]) }}">
                                    <input type=hidden name="_method" value="delete">
                                    {!!csrf_field()!!}
                         </form>
                    </div>
            
              </div>
          </div>
            @endforeach
        </div>
          <div class="responsive text-center">
             <button type="button" class="btn btn-primary btn-lg" id="postimg" style="width: 100%;margin-top: 10%">
                <i class="fa fa-plus-circle fa-lg"></i>
             </button>
         </div>
               
        <div class="form-group">
            <input type="submit" name="Add" class="btn btn-success form-control" value="update">
        </div>
    </form>
    </div>
   
     </div>
 </div>
</div>
@endsection