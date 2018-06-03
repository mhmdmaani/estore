<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('id','desc')->get();
                return view("tags.index",['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            return view("tags.create");
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
        $tag         = new Tag();
        $tag->name   = $request->input('name');
          $save       = $tag->save();
       if($save)
       {
              return redirect()->route('tags.create')->with('success','Tag is added successfully!!!');
       }
           return redirect()->route('tags.create')->with('errors','Tag is not added because of errors!!!');
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
            $tag   = Tag::find($id);
         //$posts = $pro->posts()->orderBy('created_at','desc')->paginate(10);
            return view('tags.show',['tag'=>$tag]);
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit(Tag $tag)
     {
         //
             $id = $tag->id;
              $selected = Tag::Find($id);
         return view('tags.edit',['tag'=>$selected]);
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
           $tag              = Tag::Find($request->input('id'));
         $tag->name          = $request->input('name');
             $save = $tag->save();
             if($save){
                 return redirect()->route('tags.index')->with('success','Tag is added successfully!!!');
             }
              return redirect()->route('tags.index')->with('errors','Tag  didnt updated!!!');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy(Tag $tag)
     {
         //

            $tag->Delete();
               return redirect()->route('tags.index')->with('success','Tag is removed successfully!!!');
     }
 }
