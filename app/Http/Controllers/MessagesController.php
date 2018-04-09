<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Product;
use auth;
use App\User;
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
    public function sendSms(Request $request){
        $productID = $request->input('productID');
        $sender = Auth::User();
        $product         = Product::Find($productID);
        if($sender!=$product->user()){
            $reciver = $product->user();
        }else{
            $reciver = Message::Where('productID','','')
        }
        $owner           =
        $smsBody         = $request->input('smsBody');

        $Sms             = new Message();
        $Sms->sender_id  =  $senderID;
        $Sms->reciver_id = $recieverID;
        $Sms->product_id =  $productID;
        $Sms->body       =  $smsBody;
        $Sms->save();

        $product->messages()->save($Sms);
        $sender->sendedmessages()->save($Sms);
        $reciever->recivedmessages()->save($Sms);

        return response()->json(new MessageResource($Sms));
    }
    public function newchat($request){
        $sender = Auth::user();
        $product =Product::Find($request->input('productID'));
        $reciever = $product->user();
        $sms = new Message();
        $sms->sender_id=$sender->id;
        $sms->reciver_id=$reciever->id;
        $sms->product_id = $product->id;
        


    }
}
