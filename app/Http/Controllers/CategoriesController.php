<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $categories = Category::All();
        return view("categories.index",['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view("categories.create");
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
         $Category         = new Category();
         $Category->name   = $request->input('name');
           $save       = $Category->save();
        if($save)
        {
               return redirect()->route('categories.create')->with('success','Category is added successfully!!!');
        }
            return redirect()->route('categories.create')->with('errors','Category is not added because of errors!!!');
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
             $Category = Category::find($id);
        //$posts = $pro->posts()->orderBy('created_at','desc')->paginate(10);
           return view('categories.show',['category'=>$Category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        //
            $id = $Category->id;
             $selected = Category::Find($id);
        return view('categories.edit',['category'=>$selected]);
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
          $Category              = Category::Find($request->input('id'));
        $Category->name          = $request->input('name');
            $save = $Category->save();
            if($save){
                return redirect()->route('categories.index')->with('success','Category is added successfully!!!');
            }
             return redirect()->route('categories.index')->with('errors','Category  didnt updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        //

           $Category->Delete();
              return redirect()->route('categories.index')->with('success','Category is removed successfully!!!');
    }
}
