<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $places = Place::All();
        return view("places.index",['places'=>$places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view("places.create");
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
         $place         = new Place();
         $place->name   = $request->input('name');
           $save       = $place->save();
        if($save)
        {
               return redirect()->route('places.create')->with('success','Place is added successfully!!!');
        }
            return redirect()->route('places.create')->with('errors','Place is not added because of errors!!!');
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
             $place = Place::find($id);
        //$posts = $pro->posts()->orderBy('created_at','desc')->paginate(10);
           return view('places.show',['place'=>$place]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
            $id = $place->id;
             $selected = Place::Find($id);
        return view('places.edit',['Place'=>$selected]);
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
          $place              = Place::Find($request->input('id'));
        $place->name          = $request->input('name');
            $save = $place->save();
            if($save){
                return redirect()->route('places.index')->with('success','Place is added successfully!!!'); 
            }
             return redirect()->route('places.index')->with('errors','Place  didnt updated!!!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //   
           $place->Delete();
              return redirect()->route('places.index')->with('success','Place is removed successfully!!!'); 
    }
}
