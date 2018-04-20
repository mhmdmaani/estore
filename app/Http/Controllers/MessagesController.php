<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Product;
use auth;
use App\User;
use App\Chat;
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
    public function sendSms(Request $request)
    {
       $sender               = Auth::user();
       $chatID               = $request->input('chatID');
       $body                 = $request->input('smsBody');
       $message              = new Message();
       $message->sender_id   = $sender->id;
       $message->chat_id     = $chatID;
       $message->body        = $body;
       $message->save();
       $chat                 = Chat::find($chatID);
       $chat->messages->save($message);
       $messages             = $chat->messages();
       $messages             = json_encode($messages);
       return response()->json($messages);
    }

    public function newchat(Request $request)
    {
      $sender = Auth::user();
      $product = Product::Find($request->input('productID'));
      $chat=null;
      if($sender->chats()->count('product_id','=',$product->id)>0)
      {
          $chat=null;
      }else
      {
      $chat = new Chat();
      $chat->product_id=$product->id;
      $chat->save();
      $product->chats()->save($chat);
      $sender->chats()->save($chat);
      $chat = json_encode($chat);
      }
       return response()->json($chat);
    }
}
