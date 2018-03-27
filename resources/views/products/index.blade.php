@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-primary" style="margin:10 auto">
                        <div class="panel-heading">
                           Products 
                           <a href="/products/create" class="btn btn-success pull-right btnaddpro" >
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
                                            <th>description</th>
                                            <th>price</th>
                                            <th>user</th>
                                            <th>place</th>
                                            <th>category</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                       @if($product->is_sold==1)
                                       {
                                        <tr class="danger">
                                         }else{
                                            <tr class="success">
                                                }
                                       @endif
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->user->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                               <img src="/storage/images/{{$product->logoPath}}" class="img-responsive img-thumbniel pull-right">
                                            </td>
                                            <td>
                                              <a href="/branches/{{$product->id}}">
                                                <button class="btn btn-secondary">Show</button>
                                             </a>
                                             <a href="branches/{{$product->id}}/edit">
                                                <button class="btn btn-success">Edit</button>
                                             </a> 
                                             @if($product->is_active==1){
                                             <a href="products/{{$product->id}}/deactivate">
                                                <button class="btn btn-success">Deactive</button>
                                             </a> 
                                         }else{
                                         <a href="products/{{$product->id}}/activate">
                                                <button class="btn btn-success">activate</button>
                                             </a> 
                                     }  
                                     @endif                                   
                                             <button class="btn btn-danger"onclick="
                                             var result = confirm('Do you sure to delete this project??');
                                             if(result){
                                                 document.getElementById('deleteForm').submit();
                                             }
                                                      
                                             " >Delete</button> 
                                          <form method="POST" id="deleteForm" action="{{ route('branches.destroy',[$product->id]) }}">
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
