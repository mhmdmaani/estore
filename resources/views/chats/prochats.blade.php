@extends('layouts.app')
@section('content')
<div class="chatsCont">
        <aside>
         <ul style="unstyled-list">
             @foreach($chats as $chat)
                <li>
                    <form method="post" action="/chatmessages">
                    <input type="hidden" value="{{$chat->id}}">
                  <button>{{$chat->users()->where('user_id','!=',Auth::user()->id)->first()->name}}</button>
                    </form>
                </li>
             @endforeach
         </ul>
        </aside>
</div>
<div class="messages">
        <div id="live-chat">

                <header class="clearfix">            
                  <a href="#" class="chat-close">x</a>
                  <h4>{{$chat->users()->where('users.id','!=',Auth::user()->id)->first()->name}}</h4>
            
                  <span class="chat-message-counter">3</span>
                </header>
                <div class="chat">
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
                      <input type="hidden" name="senderID" value="{{Auth::user()->id}}"> <input type="hidden" name="id" value="{{$product->id}}">
                      <div class="form-group postreview" >
                          <!--paths-->
                  </div>
                     <button class="sendbtn"><i class="fa fa-plane"></i></button>
                  </form>
            
                  <button class="btn btn-secondary postimg" >
                     <i class="fa fa-photo" ></i>
                  </button>
                </div> <!-- end chat -->
              </div> <!-- end live-chat -->
</div>
@endsection