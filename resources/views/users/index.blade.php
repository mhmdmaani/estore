@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/users/searchbyid" class="form" >
    {!!csrf_field()!!}
        <div class="form-group">
            <input class="form-control" placeholder="Enter user id"
            name="userID">
        </div>
    </form>
     <form method="post" action="/users/searchbyname" class="form" >
    {!!csrf_field()!!}
        <div class="form-group">
            <input class="form-control" placeholder="Enter user name"
            name="userName">  
        </div>
        <div class="form-group">
            <input type="submit" value="Search" class="btn btn-primary">
        </div>
    </form>
  <div class="panel panel-primary">
                        <div class="panel-heading">
                           users 
                           <a href="{{ route('users.create')}}" class="btn btn-success pull-right btnaddpro"  >
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
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Num of products</th>
                                            <th>date</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                       @if($user->is_active==0)
                                       
                                        <tr class="danger">
                                         @else
                                            <tr class="success">
            
                                       @endif
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->tel}}</td>
                                            <td>{{$user->products()->count()}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                        @if($user->image!=null)
                                            <img class="img img-responsive" src="/storage/images/{{$user->image}}" width="50px" height="50px">
                                        @else
                                            <img class="img img-responsive" src="/storage/images/defaultuser.png" width="50px" height="50px">  
                                        @endif
                                            </td>
                                            <td>
                                              <a href="/users/{{$user->id}}">
                                                <button class="btn btn-secondary">Show</button>
                                             </a>
                                             <a href="/users/{{$user->id}}/edit">
                                                <button class="btn btn-success">Edit</button>
                                             </a> 
                                   @if($user->is_active==1)
                                             <a href="/user/{{$user->id}}/disapprove">
                                                <button class="btn btn-success">Disapprove</button>
                                             </a> 
                                         
                                         @else
                                         <a href="/user/{{$user->id}}/approve">
                                                <button class="btn btn-success">Approve</button>
                                         </a> 
                                      
                                     @endif                                   
                                             <button class="btn btn-danger" onclick="
                                             var result = confirm('Do you sure to delete this project??');
                                             if(result){
                                                 document.getElementById('delete{{$user->id}}').submit();
                                             }
                                                      
                                             " >Delete</button> 
                                          <form class="hidden" method="POST" id="delete{{$user->id}}" action="{{ route('users.destroy',[$user->id]) }}">
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
                    </div>
</div>
@endsection
