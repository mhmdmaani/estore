@extends('layouts.app')

@section('content')
<input id="proid" type="hidden" name="pID" value="{{$product->id}}" >
<div class="container">
  <div style="width: 70% ; margin:10px auto">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach($product->media()->get() as $k=> $m)
       @if($m==$product->media()->first())
    <li data-target="#myCarousel" data-slide-to="{{$k}}" class="active"></li>
    @else
    <li data-target="#myCarousel" data-slide-to="{{$k}}"></li>
    @endif
    @endforeach
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @foreach($product->media()->get() as $key=>$media)
     @if($media==$product->media()->first())
    <div class="item active">
       <div class="item">
        <div style="width: 100% ; height:500px;background:#333;overflow: hidden;">
      <a href="/storage/images/{{$media->path}}"  target="#">
      <img src="/storage/images/{{$media->path}}" alt="" style="width: 100%; max-height: 500px">
    </div>
    </div>
  </div>
    @else
      <div class="item">
        <div style="width: 100% ; height:500px;background:#333;overflow: hidden;margin: auto">
      <a href="/storage/images/{{$media->path}}"  target="#">
       <img src="/storage/images/{{$media->path}}" alt="Los Angeles" style="max-width: 100%; max-height: 100%">
      </a>
    </div>
    </div>
    @endif
@endforeach
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
   <i class="fa fa-arrow-left" style="margin-top: 200px"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <i class="fa fa-arrow-right" style="margin-top: 200px"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<div class="row proCont">
    <h3 class=" proName text-center">{{$product->name}}</h3>
    <div class="col col-md-6">
      <div class="proInfo">
        @if($product->is_sold==1)
                <div class="alert alert-danger"> Sold</div>
        @endif
            <p class="price"><span>{{$product->price}}</span>  {{$product->curr->name}}</p>
            <h5>City:   <span>{{$product->place->name}}</span></h5>
            <h5>published at:  <span>{{$product->created_at}}</span></h5>
            <h6>{{$product->description}}</h6>
            <h5>published by:  <span>{{$product->user->name}}</span></h5>
            <h5>Category:  <a  href="/category/{{$product->category->id}}" class="btn btn-success">{{$product->category->name}}</a></h5>
            <h5>Tags:</h5>
            <p>
            @foreach($product->tags()->get() as $tag)
               <a href="/tag/{{$tag->id}}" class="btn btn-primary btn-sm">{{$tag->name}}</a>
            @endforeach
          </p>
      </div>
  </div>
  <div class="col col-md-6">
    @if($product->user_id!=Auth::user()->id)
    <div class="btnsCont">
        <form id="newchatForm" action="/newchat" method="post">
                {{csrf_field()}}
                <input type="hidden"  id="proid" name="productID" value="{{$product->id}}">
                 <button class="btn btn-primary" id="newchatbtn"> <i class="fa fa-comments"></i>  chat Siller</button>

        </form>
          <button id="reportbtn" class="btn btn-primary"><i class="fa fa-bug"></i>  Report this item</button>
        <button class="btn btn-primary" id="callSiller" ><i class="fa fa-phone"></i>  call siller </button>
         <button class="btn btn-primary" id="mailSeller"> <i class="fa fa-envelope-o"></i>  mail siller </button>
  </div>
      @else
      <div class="btnsCont">
        <!--edit and mark as sold by owner-->
    </div>

      @endif
  </div>
</div>
<div class="row">
  <div class="recommended_items"><!--recommended_items-->
    @if($relatedItems->count()>0)
              <h2 class="title text-center">related items</h2>

              <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  @foreach($relatedItems->get() as $latestPro)
                  <div class="item">
                    <div class="col-sm-4">
                      <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                              <img src="/storage/images/{{$latestPro->media()->first()->path}}" alt="" />
                              <h2>{{$latestPro->price}} {{$latestPro->curr->name}}</h2>
                              <p>{{$latestPro->name}}</p>
                              <a href="/item/{{$latestPro->id}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
                            </div>
                            <div class="product-overlay">
                              <div class="overlay-content">
                                <h3><i class="fa fa-map-marker"></i> {{$latestPro->place->name}}</h3>
                                <h2>{{$latestPro->price}} {{$latestPro->curr->name}}</h2>
                                <p>{{$latestPro->name}}</p>
                                <a href="/item/{{$latestPro->id}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Details</a>
                              </div>
                            </div>
                        </div>
                        <div class="choose">
                          <ul class="nav nav-pills nav-justified">
                            <li>
                            @if(auth::user())
                              @if($latestPro->favusers()->wherePivot('user_id','=',auth::user()->id)->count()==0)
                              <form method="post" action="" class="text-center">
                                {{ csrf_field() }}
                                <input type="hidden" name="productID" value="{{$latestPro->id}}" >
                              <button class="addFav btn btn-primary "><i class="fa fa-star"></i> <span class="btntxt">Add to favorite</span></button>
                             </form>
                              @else
                              <form method="post" action="">
                                {{ csrf_field() }}
                                <input type="hidden" name="productID" value="{{$latestPro->id}}" >
                              <button class="addFav btn btn-primary " ><i class="fa fa-check"></i><span class="btntxt"> Saved</span></button>
                            </form>
                              @endif
                            @else
                                 <a href="/login}}" class="btn btn-primary" enable="false"><i class="fa fa-user"></i>login</a>
                            @endif
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>
              </div>
              @endif
            </div>
</div>
 <!--chat Box-->
  <!--auth user same the product owner-->
  <div id="chatsCont">
  @foreach($chats as $chat)
  <div id="live-chat">
    <header class="clearfix">
      <a href="#" class="chat-close">x</a>
      <h4>{{ $chat->users()->where('users.id','<>',auth::user()->id)->first()->name }}</h4>
      <span class="chat-message-counter">3</span>
    </header>
    <div class="chat" id="{{$chat->id}}">
      <div class="chat-history" id="{{$chat->id}}text">
        @foreach($chat->messages()->get() as $message )
        <input type="hidden" name="smsID" value="{{$message->id}}">
        <div class="chat-message clearfix">
          <img src="{{$message->sender->image}}" alt="" width="32" height="32">
          <div class="chat-message-content clearfix" >
            <span class="chat-time">{{$message->created_at}}</span>
            <h5>{{$message->sender->name}}</h5>
            <p>{{$message->body}}</p>
            @if($message->smsimages()->count()>0)
            @foreach($message->smsimages as $img)
                <div class="row">
                  <a href="/storage/images/{{$img->path}}" target="#">
                    <img src="/storage/images/{{$img->path}}"/>
                  </a>
                </div>
            @endforeach
            @endif
          </div> <!-- end chat-message-content -->
        </div> <!-- end chat-message -->
         <hr>
        @endforeach
      </div> <!-- end chat-history -->
      <form action="addmessage" method="post" class="sendmessage"  enctype="multipart/form-data">
          {!!csrf_field()!!}
          <input type="text" name="smsBody" placeholder="Type your message…" autofocus class="smsBody">
          <input type="hidden" name="chatID" value="{{$chat->id}}" class="chatID">
          <input type="hidden" name="senderID" value="{{Auth::user()->id}}">
           <input type="hidden" name="id" value="{{$product->id}}">
          <div class="form-group postreview" >
              <!--paths-->
          </div>
         <button class="sendbtn"><i class="fa fa-paper-plane"></i></button>
      </form>
      <button class="btn btn-secondary postimg" >
         <i class="fa fa-photo" ></i>
      </button>
    </div> <!-- end chat -->
  </div> <!-- end live-chat -->
  @endforeach
</div><!--End chatsCont-->
</div><!--End div-->
</div><!--End conatainer-->
<audio id="smssound">
  <source src="/storage/smsincome.mp3" type="audio/mpeg">
</audio>
<div class="telCont">
  <div class="closeCont"> <i id="telClose" class="fa fa-times"></i> </div>
  <div> <i class="fa fa-info"></i></div>
 <h3><i class="fa  fa-phone-square"></i>   {{$product->user->tel}}</h3>
 <h3><i class="fa  fa-user"></i>   {{$product->user->name}}</h3>
</div><!--End telCont-->
<div class="mailCont">
  <div class="closeCont"> <i id="mailClose" class="fa fa-times"></i> </div>
  <form id="emailForm" class="" action="/sendemail" method="post">
    {!!csrf_field()!!}
    <input type="hidden" name="to" value="{{$product->user->email}}">
    <input type="hidden" name="sender" value="{{auth::user()->email}}">
    <input type="hidden" name="title" value="{{$product->name}}">
    <textarea name="body"></textarea>
    <button class="btn btn-primary" id="sendmail"> <i class="fa fa-paper-plane"></i> send</button>
  </form><!--End form-->
</div><!--End mailCont-->
<!--Add report Form-->
<div class="reportCont">
  <div class="closeCont"> <i id="reportclose" class="fa fa-times"></i> </div>
<form id="reportForm" class="" action="/sendreport" method="post">
  {!!csrf_field()!!}
  <input type="hidden" name="productID" value="{{$product->id}}">
  <textarea name="body"></textarea>
  <button class="btn btn-primary" id="sendreport"> <i class="fa fa-paper-plane"></i> send</button>
</form><!--End form-->
</div> <!--End reportCont-->
<!--  success message-->
  <div id="success">
      <div></div>
      <button class="btn btn-primary">Ok</button>
  </div>
<!--End success message-->
<!--overlay-->
<div class="overlay">

</div>

<!--sending form template-->
<div class="hidden" id="sendtemplate">
<form action="addmessage" method="post" class="sendmessage"  enctype="multipart/form-data">
    {!!csrf_field()!!}
    <input type="text" name="smsBody" placeholder="Type your message…" autofocus class="smsBody">
    <input type="hidden" name="chatID" value="" class="chatID">
    <input type="hidden" name="senderID" value="">
     <input type="hidden" name="id" value="">
    <div class="form-group postreview" >
        <!--paths-->
    </div>
   <button class="sendbtn"><i class="fa fa-paper-plane"></i></button>
</form>
<!--imag button template-->
<button class="btn btn-secondary postimg" >
   <i class="fa fa-photo" ></i>
</button>

</div>
@endsection
