@extends('layouts.app')
@section('content')
<div class="jumbotron">
                        <h1 class="text-center">{{$place->name}}</h1>
                        <p class="pull-right">{{$place->created_at->format('Y-m-d')}}</p>
 </div>
<br />
@endsection()