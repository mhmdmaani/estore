@extends('layouts.app')

@section('content')
<div class="container">
<div class="panel panel-primary" style="margin:10px auto;width:50%">
  <div class="panel-heading text-center"> 
    Add new product:
  </div>
  
      <div class="panel-body">
      <form method="post" action="{{route('products.store')}}" class="form"
      enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="form-group">
                 <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div> 
            <div class="form-group">
                 <label>Discription</label>
                <textarea name="description" class="form-control"></textarea>
            </div> 
            <div class="form-group">
                 <label>price</label>
                <input type="text" name="price" class="form-control">
            </div>
             <div class="form-group">
                 <label>Currency</label>
                <select class="form-control" name="currency">
                    @foreach($currs as $curr){
                        <option value="{{$curr->id}}">{{$curr->name}}</option>
                }
                @endforeach
                </select>
            </div>
             <div class="form-group">
                 <label>Category</label>
                 <select class="form-control" name="category">
                    @foreach($categories as $cat){
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        }
                        @endforeach
                </select>
            </div>
             <div class="form-group">
                 <label>Place</label>
                 <select class="form-control" name="local">
                    @foreach($places as $place){
                        <option value="{{$place->id}}">{{$place->name}}</option>
                        }
                        @endforeach
                </select>
             </div>
             <label>Tags</label>
            <div class="bs-example">
            <input name="tags" type="text" data-role="tagsinput" value="" />
            </div> 
             <div class="hidden" id="paths" >
                <!--hidden files-->
             </div>
            <input type="submit" name="Add" class="btn btn-success" value="Add New Product">
    </form>
    <div class="section newmediaCont">
        <div class="" id="postreview">
            
        </div>
    </div>
    <button class="btn btn-secondary" id="postimg">
         <i class="fa fa-photo" ></i>
    </button>
     </div>
 </div>
</div>
@endsection