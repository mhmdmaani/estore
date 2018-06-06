@extends('layouts.app')
@section('content')
<div class="container">
<div class="panel panel-primary" style="margin:10 auto">
                        <div class="panel-heading">
                           tags
                           <a href="{{ route('tags.create')}}" class="btn btn-success pull-right btnaddpro" >
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
                                    @foreach($tags as $Tag)
                                        <tr class="success">
                                            <td>{{$Tag->id}}</td>
                                            <td>{{$Tag->name}}</td>
                                            <td>{{$Tag->created_at}}</td>
                                            <td>
                                              <a href="/tags/{{$Tag->id}}">
                                                <button class="btn btn-secondary">Show</button>
                                             </a>
                                             <a href="tags/{{$Tag->id}}/edit">
                                                <button class="btn btn-success">Edit</button>
                                             </a>
                                             <button class="btn btn-danger"onclick="
                                             var result = confirm('Do you sure to delete this Currency??');
                                             if(result){
                                                 document.getElementById('deleteForm').submit();
                                             }

                                             " >Delete</button>
                                          <form method="POST" id="deleteForm" action="{{ route('tags.destroy',[$Tag->id]) }}">
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
                  </div>
@endsection
