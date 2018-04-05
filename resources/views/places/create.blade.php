@extends('layouts.app')
@section('content')
<div class="panel panel-primary" style="margin:10 auto" width="70%">
  <div class="panel-heading"> New Place </div>
       <div class="panel-body">               
<form method="post" action="{{route('places.store')}}" >
 {!!csrf_field()!!}
                <div class="form-group">
                    <label class="control-label" for="inputSuccess">Place Name</label>
                    <input type="text" class="form-control" id="inputSuccess" name="name">
                </div>
                 <div class="form-group">
                     <input type="submit" class="btn btn-success pull-right" value="Add Place"/>
                </div>
</form>
</div>
<a href="/places" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Back</a>
</div>
@endsection