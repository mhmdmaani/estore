@extends('layouts.app')
@section('content')
<div class="panel panel-primary" style="margin:10 auto" width="70%">
  <div class="panel-heading"> New Currency </div>
       <div class="panel-body">               
<form method="post" action="{{ route('currs.update',[$curr->id]) }}">
 {!!csrf_field()!!}
 <input type="hidden" name="_method" value="put">
 <input type="hidden" name="id" value="{{$curr->id}}">
                <div class="form-group">
                    <label class="control-label" for="inputSuccess">Currency Name</label>
                    <input type="text" class="form-control" id="inputSuccess" name="name"
                      value="{{$curr->name}}">
                </div>
                 <div class="form-group">
                     <input type="submit" class="btn btn-success pull-right" value="Update Currency"/>
                </div>
</form>
</div>
<a href="/currs" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Back</a>
</div>
@endsection