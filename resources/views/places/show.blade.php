@extends('layouts.app')
@section('content')
<div class="jumbotron">
      <h1 class="text-center">{{$place->name}}</h1>
      <p class="pull-right">{{$place->created_at->format('Y-m-d')}}</p>
 </div>
<br />
<div class="panel panel-primary">
                      <div class="panel-heading">
                         Products
                         <a href="{{ route('products.create')}}" class="btn btn-success pull-right btnaddpro"  >
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
                                          <th>Operations</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($place->products()->orderBy('id','desc')->get() as $product)
                                     @if($product->is_sold==1)

                                      <tr class="danger">
                                       @else
                                          <tr class="success">
                                     @endif
                                          <td>{{$product->id}}</td>
                                          <td>{{$product->name}}</td>
                                          <td>{{$product->description}}</td>
                                          <td>{{$product->price}}</td>
                                          <td>{{$product->user->name}}</td>
                                          <td>{{$product->category->name}}</td>
                                          <td>{{$product->created_at}}</td>
                                          <td>
                                            <a href="/products/{{$product->id}}">
                                              <button class="btn btn-secondary">Show</button>
                                           </a>
                                           <a href="/products/{{$product->id}}/edit">
                                              <button class="btn btn-success">Edit</button>
                                           </a>
                                 @if($product->is_active==1)
                                           <a href="/product/{{$product->id}}/disapprove">
                                              <button class="btn btn-success">Disapprove</button>
                                           </a>

                                       @else
                                       <a href="/product/{{$product->id}}/approve">
                                              <button class="btn btn-success">Approve</button>
                                       </a>

                                   @endif
                                           <button class="btn btn-danger" onclick="
                                           var result = confirm('Do you sure to delete this project??');
                                           if(result){
                                               document.getElementById('delete{{$product->id}}').submit();
                                           }

                                           " >Delete</button>
                                        <form method="POST" id="delete{{$product->id}}" action="{{ route('products.destroy',[$product->id]) }}">
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
@endsection()
