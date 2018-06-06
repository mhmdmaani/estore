@extends('layouts.app')
@section('content')
 <div class="container">
 	<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <!---->
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$products->count()}}</div>
                                    <div>products</div>
                                </div>
                            </div>
                        </div>
                        <a href="/products">
                            <div class="panel-footer">
                                <span class="pull-left">Manage</span>
                                <span class="pull-right"><i class="fa fa-gear"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                        <!---->
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$tags->count()}}</div>
                                    <div>Tags</div>
                                </div>
                            </div>
                        </div>
                        <a href="/tags">
                            <div class="panel-footer">
                                <span class="pull-left">Manage</span>
                                <span class="pull-right"><i class="fa fa-gear"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <!---->
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-map fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$places->count()}}</div>
                                    <div>Places</div>
                                </div>
                            </div>
                        </div>
                        <a href="/places">
                            <div class="panel-footer">
                                <span class="pull-left">Manage</span>
                                <span class="pull-right"><i class="fa fa-gear"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-puzzle-piece fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$categories->count()}}</div>
                                    <div>Categories!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/categories">
                            <div class="panel-footer">
                                <span class="pull-left">Manage</span>
                                <span class="pull-right"><i class="fa fa-gear"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dollar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$currs->count()}}</div>
                                    <div>Currency!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/currs">
                            <div class="panel-footer">
                                <span class="pull-left">Manage</span>
                                <span class="pull-right"><i class="fa fa-gear"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$users->count()}}</div>
                                    <div>users!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/users">
                            <div class="panel-footer">
                                <span class="pull-left">Manage</span>
                                <span class="pull-right"><i class="fa fa-gear"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$chats->count()}}</div>
                                    <div>Chats!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/chats">
                            <div class="panel-footer">
                                <span class="pull-left">Manage</span>
                                <span class="pull-right"><i class="fa fa-gear"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$chats->count()}}</div>
                                    <div>Reports!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/reports">
                            <div class="panel-footer">
                                <span class="pull-left">Manage</span>
                                <span class="pull-right"><i class="fa fa-gear"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>
 </div>
 <section>
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          <i class="fa fa-rocket fa-xl"></i> Latest products
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>description</th>
                                            <th>price</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @foreach($products->Limit(10)->get() as $pro)
                                        <tr>
                                            <td>{{$pro->id}}</td>
                                            <td>{{$pro->name}}</td>
                                            <td>{{$pro->description}}</td>
                                            <td>{{$pro->price}}</td>
                                            <td>{{$pro->created_at}}</td>
                                        </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
 		<div class="col-lg-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                                    <i class="fa fa-puzzle-piece fa-xl"></i>
                                    Latest Categories
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @foreach($categories->Limit(10)->get() as $act)
                                        <tr>
                                            <td>{{$act->id}}</td>
                                            <td>{{$act->name}}</td>
                                            <td>{{$act->created_at}}</td>
                                          
                                        </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
 		</div>
 		<div class="row">
 		<div class="col-lg-12 ">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                          <i class="fa fa-user fa-xl"></i> Latest  users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>first Name</th>
                                            <th>Last Name</th>
                                            <th>Telephone</th>
                                            <th>num of products</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          @foreach($users->limit(10)->get() as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->lastName}}</td>
                                            <td>{{$user->telephone}}</td>
                                            <td>{{$user->products()->count()}}</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
 		</div>
 	</div>
 </section>
@endsection