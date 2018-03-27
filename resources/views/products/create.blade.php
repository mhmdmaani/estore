@extends('layouts.app')

@section('content')
<div class="panel panel-primary" style="margin:10 auto" width="70%">
  <div class="panel-heading"> 
    Add Post to Activity  :(<strong>{{$activity->name}}</strong>)
  </div>
  
      <div class="panel-body">
      <form method="post" action="">
            <div class="form-group">
                 <label>Name</label>
                <input type="text" name="name"> class="form-control" rows="3">
            </div> 
            <div class="form-group">
                 <label>Discription</label>
                <textarea class="form-control" rows="3"></textarea>
            </div> 
            <div class="form-group">
                 <label>price</label>
                <input type="text" name="price"> class="form-control" rows="3">
            </div>
             <div class="form-group">
                 <label>Currency</label>
                <select class="form-control" rows="3">
                    @foreach($currs as $curr){
                        <option value="{$curr->id}">{$curr->name}</option>
                }
                @endforeach
                </select>
            </div>
        
             <div class="hidden" id="paths" >
                <!--hidden files-->
             </div>
            <input type="submit" name="Add" class="btn btn-success">
    </form>
    <div class="section newmediaCont">
        <div class="" id="postreview">
            
        </div>
    </div>
    <button class="btn btn-secondary" id="postimg">
         <i class="fa fa-photo" ></i>
    </button>
    <button class="btn btn-secondary" id="postvideo">
        <i class="fa fa-video-camera"></i>
    </button>
     </div>
 </div>
@endsection