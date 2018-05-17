<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Product;
use Auth;
use App\User;
use App\Chat;
use App\Smsimage;
use App\Resources\Http\Resources\Message as MessageResource;
class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function sendsms(Request $request)
    {
      if($request->isMethod('post'))
      {
       $user                 = Auth::user();
       $chatID               = $request->input('chatID');
       $body                 = $request->input('smsBody');
       $images               = $request->file('imgFiles');
       $message              = new Message();
       $message->sender_id   = $user->id;
       $message->chat_id     = $chatID;
       $message->body        = $body;
       $sms                  = $message->save();
     if(!empty($images))
     {
     foreach($images as $image=> $value)
       {
       $imgName              = md5(time().uniqid()).'.'.$value->getClientOriginalExtension();
         $value->storeAs('public/images',$imgName);
         $img                = new Smsimage();
         $img->path          = $imgName;
         $img->message_id    = $message->id;
         $img->save();
         $message->smsimages()->save($img);
       }
     }

       $chat                 = Chat::find($chatID);
       $chat->messages()->save($message);
       $sender               =User::Find(Auth::user()->id);
       $sender->messages()->save($message);
       $chat                 = $message->chat;
       $product              = $chat->product;
       $smsimages            =$message->smsimages()->get();
      /* $message              =json_encode($message);
       $sender               =json_encode($sender);
       $chat                 =json_encode($chat);
      $smsimages            =json_encode($smsimages);*/
       return response()
              ->json([
      'message'              =>$message,
      'sender'               =>$sender,
      'chat'                 =>$chat,
      'smsimages'            =>$smsimages
                     ]);
  }
  }
    public function newchat(Request $request)
    {
      $sender                = Auth::user();
      $product               = Product::Find($request->input('productID'));
      $chat                  = null;
      if($sender->chats()->count('product_id','=',$product->id)>0)
      {
       $chat                 = null;
      }else
      {
       $chat                 = new Chat();
      $chat->product_id      = $product->id;
      $chat                  ->save();
      $product->chats()      ->save($chat);
      $sender->chats()       ->save($chat);
      $chat                  = $chat;
      }
       return response()->json($chat);
    }
    public function latestsms($id)
    {
      $productID    = $id;
      $chats        =Product::Find($productID)->chats()->get();
       return response(['chats'=>$chats]);
     }
}
