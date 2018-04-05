@extends('layouts.app')
@section('content')
<div class="jumbotron">
                        <h1 class="text-center">{{$curr->name}}</h1>
                        <p class="pull-right">{{$curr->created_at->format('Y-m-d')}}</p>
 </div>
<br />
@endsection()