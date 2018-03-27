@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-primary" style="margin:10 auto">
                        <div class="panel-heading">
                           Products 
                           <a href="{{ route('branches.create')}}" class="btn btn-success pull-right btnaddpro" >
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
                                            <th>address</th>
                                            <th>tel</th>
                                            <th>description</th>
                                            <th>Creating Date</th>
                                            <th>Logo</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($branches as $branch)
                                        <tr class="success">
                                            <td>{{$branch->id}}</td>
                                            <td>{{$branch->name}}</td>
                                            <td>{{$branch->address}}</td>
                                            <td>{{$branch->tel}}</td>
                                            <td>{{$branch->description}}</td>
                                            <td>{{$branch->created_at}}</td>
                                            <td>
                                               <img src="/storage/images/{{$branch->logoPath}}" class="img-responsive img-thumbniel pull-right">
                                            </td>
                                            <td>
                                              <a href="/branches/{{$branch->id}}">
                                                <button class="btn btn-secondary">Show</button>
                                             </a>
                                             <a href="branches/{{$branch->id}}/edit">
                                                <button class="btn btn-success">Edit</button>
                                             </a>                                      
                                             <button class="btn btn-danger"onclick="
                                             var result = confirm('Do you sure to delete this project??');
                                             if(result){
                                                 document.getElementById('deleteForm').submit();
                                             }
                                                      
                                             " >Delete</button> 
                                          <form method="POST" id="deleteForm" action="{{ route('branches.destroy',[$branch->id]) }}">
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
