<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index',['users'=>$users]);
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
        $user = User::Find($id);

        return view('users.show',['user'=>$user]);
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
        $user = User::Find($id);
        return view('users.edit',['user'=>$user]);
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
        $user = User::Find($id);
        $user->name            = $request->input('name');
        $user->email           = $request->input('email');
        $user->tel             = $request->input('tel');
        if(!empty($request->file('image'))){
            $value =$request->file('image');
            $imgName          = md5(time().uniqid()).'.'.$value->getClientOriginalExtension();
            $value->storeAs('public/images',$imgName);
            $user->image = $imgName;
            $product->media()->save($img);
        }
        $user->save();

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
        $user = User::Find($id);
        $peoducts = $user->products()->delete();
    }
    public function approve($id){
        $user = User::Find($id);
        $user->is_active=1;
        $user->save();
        return redirect()->back();
      }
      public function disapprove($id){
        $user = User::Find($id);
        $user->is_active=0;
        $user->save();
        return redirect()->back();
      }
      public function addproducttosaved(Request $request){
        $user = Auth::user();
        $product = Product::Find($request->input('productID'));
        $user->attach($request->input('productID'));
        return response()->json(['product'=>$product]);
      }
      public function deleteproductfromsaved(Request $request){
        $user = Auth::user();
        $product = Product::Find($request->input('productID'));
        $user->detach($request->input('productID'));
        return response()->json(['product'=>$product]);
      }
}
