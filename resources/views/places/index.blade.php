@extends('layouts.app')
@section('content')
<div class="panel panel-primary" style="margin:10 auto">
                        <div class="panel-heading">
                           places 
                           <a href="{{ route('places.create')}}" class="btn btn-success pull-right btnaddpro" >
                               <i class="fa fa-plus"></i>
                           </a>
                        </div>
                        <div class="panel-body">
                          <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Creating Date</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($places as $place)
                                        <tr class="success">
                                            <td>{{$place->id}}</td>
                                            <td>{{$place->name}}</td>
                                            <td>{{$place->created_at}}</td>
                                            <td>
                                              <a href="/places/{{$place->id}}">
                                                <button class="btn btn-secondary">Show</button>
                                             </a>
                                             <a href="places/{{$place->id}}/edit">
                                                <button class="btn btn-success">Edit</button>
                                             </a>                                      
                                             <button class="btn btn-danger"onclick="
                                             var result = confirm('Do you sure to delete this Currency??');
                                             if(result){
                                                 document.getElementById('deleteForm').submit();
                                             }
                                                      
                                             " >Delete</button> 
                                          <form method="POST" id="deleteForm" action="{{ route('places.destroy',[$place->id]) }}">
                                                    <input type=hidden name="_method" value="delete">
                                                    {!!csrf_field()!!}
                                         </form>
                                            </td>
                                        </tr>
                                       
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
@endsection