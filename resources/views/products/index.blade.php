@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/products/searchbyid" class="form" >
    {!!csrf_field()!!}
        <div class="form-group">
            <input class="form-control" placeholder="Enter Product id"
            name="productID">
        </div>
    </form>
     <form method="post" action="/products/searchbyname" class="form" >
    {!!csrf_field()!!}
        <div class="form-group">
            <input class="form-control" placeholder="Enter product name"
            name="productName">  
        </div>
        <div class="form-group">
            <input type="submit" value="Search" class="btn btn-primary">
        </div>
    </form>
    <div style="background:#f0f0f0; border-radius: 5px ; border: 1px solid #e50326; padding: 10px ">
    <form method="post" action="/products/xsearch" class="form-inline">
    {!!csrf_field()!!}
    <label>Category</label>
    <select class="form-control"
             name="category">
    <option value="0" >All</option>
    @foreach($categories as $cat)
        <option value="{{$cat->id}}" >
            {{$cat->name}}
        </option>
    @endforeach
    </select> 
    <label>Currency</label>
    <select class="form-control" 
             name="currency">
             <option value="0">
                    All
              </option>
    @foreach($currs as $curr)
        <option value="{{$curr->id}}">
             {{$curr->name}}
        </option>
    @endforeach
    </select>
    <label>Place</label>
     <select class="form-control"
            name="place">
            <option value="0">All</option>
     @foreach($places as $place)
        <option value="{{$place->id}}">
            {{$place->name}}
        </option>
     @endforeach
    </select>
    <input type="submit" value="Search" class="btn btn-primary">
</form>
  <div class="panel panel-primary">
                        <div class="panel-heading">
                           Products 
                           <a href="{{ route('products.create')}}" class="btn btn-success pull-right btnaddpro" >
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
                        <div class="panel-footer">
                        </div>
                    </div>
</div>
@endsection
