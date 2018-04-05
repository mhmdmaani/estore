<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\curr;

class CurrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $currs = Curr::All();
        return view("currs.index",['currs'=>$currs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view("currs.create");
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
         $curr         = new Curr();
         $curr->name   = $request->input('name');
           $save       = $curr->save();
        if($save)
        {
               return redirect()->route('currs.create')->with('success','curr is added successfully!!!');
        }
            return redirect()->route('currs.create')->with('errors','curr is not added because of errors!!!');
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
             $curr = curr::find($id);
        //$posts = $pro->posts()->orderBy('created_at','desc')->paginate(10);
           return view('currs.show',['curr'=>$curr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(curr $curr)
    {
        //
            $id = $curr->id;
             $selected = Curr::Find($id);
        return view('currs.edit',['curr'=>$selected]);
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
          $curr              = Curr::Find($request->input('id'));
        $curr->name          = $request->input('name');
            $save = $curr->save();
            if($save){
                return redirect()->route('currs.index')->with('success','curr is added successfully!!!'); 
            }
             return redirect()->route('currs.index')->with('errors','curr  didnt updated!!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(curr $curr)
    {
        //
         
           $curr->Delete();
              return redirect()->route('currs.index')->with('success','curr is removed successfully!!!'); 
    }
}
