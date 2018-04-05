@extends('layouts.app')
@section('content')
<div class="panel panel-primary" style="margin:10 auto">
                        <div class="panel-heading">
                           currs 
                           <a href="{{ route('currs.create')}}" class="btn btn-success pull-right btnaddpro" >
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
                                    @foreach($currs as $curr)
                                        <tr class="success">
                                            <td>{{$curr->id}}</td>
                                            <td>{{$curr->name}}</td>
                                            <td>{{$curr->created_at}}</td>
                                            <td>
                                              <a href="/currs/{{$curr->id}}">
                                                <button class="btn btn-secondary">Show</button>
                                             </a>
                                             <a href="currs/{{$curr->id}}/edit">
                                                <button class="btn btn-success">Edit</button>
                                             </a>                                      
                                             <button class="btn btn-danger"onclick="
                                             var result = confirm('Do you sure to delete this Currency??');
                                             if(result){
                                                 document.getElementById('deleteForm').submit();
                                             }
                                                      
                                             " >Delete</button> 
                                          <form method="POST" id="deleteForm" action="{{ route('currs.destroy',[$curr->id]) }}">
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