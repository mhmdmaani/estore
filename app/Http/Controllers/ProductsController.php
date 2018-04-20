<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Tag;
use App\Category;
use App\Media;
use App\Place;
use App\Curr;
use App\Chat;
use Auth;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$products = Product::orderBy('id','Desc')->get();
        $categories = Category::All();
        $currs      =Curr::All();
        $places     =Place::All();
		return view('products.index',['products'=>$products,'categories'=>$categories,
                    'currs'=>$currs,'places'=>$places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::All();
        $currs = Curr::All();
        $places = Place::All();
        return view('products.create',['categories'=>$categories,'places'=>$places,
            'currs'=>$currs]);
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

        $name           = $request->input('name');
        $description    = $request->input('descrption');
        $price          = $request->input('price');
        $currency       = $request->input('currency');
        $place          = $request->input('local');
        $tags           = $request->input('tags');
        $category       = $request->input('category');
         $images        =$request->file('imgFiles');
        $user           =Auth::user();
        if(!empty($name) && !empty($price)){
        $product        = new Product();
        $product->name  = $name;
        $product->description =$description;
        $product->price = $price;
        $product->category_id = $category;
        $product->curr_id = $currency;
        $product->place_id= $place;
        $product->user_id = $user->id;
        $product->save();
        foreach (explode(",", $tags) as $tg)
        {
          if(Tag::Where('name',$tg)->count()>0){
              $tag = Tag::Where('name',$tg)->First(); 
               $tag->products()->save($product); 
            }else{
            $tag = new Tag();
            $tag->name = $tg;
            $tag->save();
             $tag->products()->save($product);
            }  
           $tag->save();
        }
        if(!empty($images)){
     foreach ($images as $image => $value) {
        $imgName          = md5(time().uniqid()).'.'.$value->getClientOriginalExtension();
         $value->storeAs('public/images',$imgName);
         $img             = new Media();
         $img->path        = $imgName;
         $img->product_id    = $product->id;
         $img->save();
         $product->media()->save($img);
       }

    }
         return redirect()->action('ProductsController@create')
         ->with('success','Product added successfully');
    }
    }

    /**
     * Display the specified resource.
     *98
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::Find($id);
        $chats = null;
        if(Auth::user())
        {
            $user= Auth::user();
          $chats =$user->chats()->where('product_id','=',$product->id)->get();
            if(Auth::user()->id==$product->user->id)
            {
                $chats = $product->chats()->get();
            }

         $user = Auth::user();
       $chats =$user->chats()->where('product_id','=',$product->id)->get();
        if(Auth::user()->id==$product->user->id){
            $chats = $product->chats()->get();
        }
        return view('products.show',['product'=>$product,'chats'=>$chats]);
    }
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
       $product = Product::Find($id);
         $categories = Category::All();
        $currs = Curr::All();
        $places = Place::All();
        return view('products.edit',['product'=>$product,'categories'=>$categories,'currs'=>$currs,'places'=>$places]);
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
         $name                   = $request->input('name');
        $description             = $request->input('descrption');
        $price                   = $request->input('price');
        $currency                = $request->input('currency');
        $place                   = $request->input('local');
        $tags                    = $request->input('tags');
        $category                = $request->input('category');
         $images              =$request->file('imgFiles');
        $user           =Auth::user();
        if(!empty($name) && !empty($price)){
        $product                  =  Product::Find($id);
        $product->name            = $name;
        $product->description     =$description;
        $product->price           = $price;
        $product->category_id     = $category;
        $product->curr_id         = $currency;
        $product->place_id        = $place;
        $product->user_id         = $user->id;
        $product->save();
        $product->tags()->delete();
        }
        foreach (explode(",", $tags) as $tg)
        {
          if(Tag::Where('name',$tg)->count()>0){
              $tag = Tag::Where('name',$tg)->First(); 
               $tag->products()->save($product); 
            }else{
            $tag = new Tag();
            $tag->name = $tg;
            $tag->save();
             $tag->products()->save($product);
            }  
           $tag->save();
        }
        if(!empty($images)){
     foreach ($images as $image => $value) {
        $imgName          = md5(time().uniqid()).'.'.$value->getClientOriginalExtension();
         $value->storeAs('public/images',$imgName);
         $img             = new Media();
         $img->path        = $imgName;
         $img->product_id    = $product->id;
         $img->save();
         $product->media()->save($img);
       }

    }
         return redirect()->action('ProductsController@index')
         ->with('success','Product updated successfully');
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
        return redirect()->back();
    }
      public function searchbyid(Request $request){
        $id = $request->input('productID');
        $products = Product::where('id','=',$id)->get();
        $categories = Category::All();
        $currs =Curr::All();
        $places =Place::All();
            return view('products.index',[ 'products'=>$products,
                    'categories'=>$categories ,'currs'=>$currs,'places'=>$places]);
    }
    public function searchbyname(Request $request){
         $search = $request->input('productName');
        $products = Product::where('name','like',
            '%'.$search.'%')->orWhere('description','like','%'.$search.'%')->get();
        $categories = Category::All();
        $currs = Curr::All();
        $places =Place::All();
            return view('products.index',[ 'products'=>$products,
                    'categories'=>$categories ,'currs'=>$currs,'places'=>$places]);
    }
      public function xsearch(Request $request){
        $products = Product::All();
        $category = $request->input('category');
        $curr = $request->input('curr');
        $place = $request->input('place');
        if($category!=0){
            $products = $products->where('category_id','=',$category);
        }
        if($curr!=0){
            $products = $products->where('curr_id','=',$curr);
        }
        if($place!=0){
            $products = $products->where('place_id','=',$place);
        }
        $categories = Category::All();
        $currs = Curr::All();
        $places =Place::All();
        $user = Auth::user();
            return view('products.index',[ 'products'=>$products,
                    'categories'=>$categories ,'currs'=>$currs,'places'=>$places]);
    }
      public function activate(Request $request){
         $productID = $request->input('productID');
         $product = Product::Find($productID);
         $product->is_active = 1;
         $product->save();
            return back();
    }
    public function approve($id){
      $product = Product::Find($id);
      $product->is_active=1;
      $product->save();
      return redirect()->back();
    }
    public function disapprove($id){
      $product = Product::Find($id);
      $product->is_active=0;
      $product->save();
      return redirect()->back();
    }
}
