<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curr;
use App\Category;
use App\Media;
use App\Tag;
use App\Place;
use App\Product;
use App\User;
use App\Chat;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories     = Category::orderBy('id','desc');
        $currs          = Curr::orderBy('id','desc');
        $products       = Product::orderBy('id','desc');
        $users          = User::orderBy('id','desc');
        $tags           = Tag::orderBy('id','desc');
        $places         = Place::orderBy('id','desc');
        $chats          =Chat::orderBy('id','desc');
        return view('panel',['categories'=>$categories,'currs'=>$currs,'products'=>$products,'users'=>$users,'tags'=>$tags,'places'=>$places,'chats'=>$chats]);
            
        
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
}
