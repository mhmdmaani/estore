<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Tag;
use App\Curr;
use App\Place;
use auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::orderBy('id','desc')->get();
      $tags = Tag::orderBy('id','desc')->get();
      $products = Product::orderBy('id','desc');
      $places = Place::orderBy('id','asc')->get();
      $currs = Curr::orderBy('id','asc')->get();
      return view('home',['categories'=>$categories, 'tags'=>$tags,'products'=>$products ,'currs'=>$currs,'places'=>$places]);
    }
    public function xsearch(Request $request){
      $products = Product::where('id','>',0);
      $proName = $request->input('itemName');
      $category = $request->input('category');
      $curr = $request->input('curr');
      $place = $request->input('place');
      if(!empty($proName)){
        $products = $products->where('name','like','%'.$proName.'%');
      }
      if($category!=0){
          $products = $products->where('category_id','=',$category);
      }
      if($curr!=0){
          $products = $products->where('curr_id','=',$curr);
      }
      if($place!=0){
          $products = $products->where('place_id','=',$place);
      }
      $pro=$products->paginate(10);
      $categories = Category::All();
      $currs = Curr::All();
      $places =Place::All();
          return view('search',[ 'products'=>$pro,
                  'categories'=>$categories ,'currs'=>$currs,'places'=>$places]);
  }
  public function addproducttosaved(Request $request){
    $user = Auth::user();
    $product = Product::Find($request->id);
    $state = "";
    if($user->savedProducts()->wherePivot('product_id','=',$product->id)->count()>0){
      $product->favusers()->detach($user->id);
       $state="remove";
      $product->save();
    }else{
          $user->savedProducts()->attach($product);
          $state="add";
          $user->save();
    }
    return response()->json(['state'=>$state]);
  }
  public function deleteproductfromsaved(Request $request){
    $user = Auth::user();
    $product = Product::Find($request->id);

    return response()->json(['product'=>$product]);
  }
  public function myads(Request $request){
    return view('customer.myads');
  }
  public function savedads(Request $request){
    $products = auth::user()->savedProducts()->get();
    return view('customer.savedads',['products'=>$products]);
  }
  public function viewProduct(Request $request){
    $product = Product::Find($request->id);
    $relatedItems = DB::table('products')->join('product_tag','product_tag.product_id','=','products.id')
                                         ->join('categories','categories.id','=','products.category_id')
                                         ->join('media','media.product_id','=','products.id')
                                         ->join('currs','currs.id','=','products.curr_id')
                                         ->join('places','places.id','=','products.place_id')
                                         ->where([
                                           ['products.id','!=',$product->id],
                                         ['categories.id','=',$product->category_id],
                                         ['places.id','=',$product->place_id],
                                         ['products.is_sold','=',0],
                                         ['products.is_active','=',0]
                                      ])->orderBy('products.id')
                                         ->take(10);
     $user = Auth::user();
     $chats =$user->chats()->where('product_id','=',$product->id)->get();
    if(Auth::user()->id==$product->user->id){
        $chats = $user->chats()->where('product_id','=',$product->id)->get();
    }
    return view('product',['product'=>$product,'chats'=>$chats,'relatedItems'=>$relatedItems]);
}
public function getcategory(Request $request){
  $category = Category::Find($request->id);
  $tags = Tag::orderBy('id','desc')->get();
  $products = $category->products()->orderBy('id','desc')->paginate(10);
  $places = Place::orderBy('id','asc')->get();
  $currs = Curr::orderBy('id','asc')->get();
  return view('categry',['category'=>$category, 'tags'=>$tags,'products'=>$products ,'currs'=>$currs,'places'=>$places]);

}
public function gettag(Request $request){
  $tags  = Tag::Find($request->id);
  $categories = Category::orderBy('id','desc')->get();
  $products = $tags->products()->orderBy('id','desc')->paginate(10);
  $places = Place::orderBy('id','asc')->get();
  $currs = Curr::orderBy('id','asc')->get();
  return view('tag',['categories'=>$categories, 'tags'=>$tags,'products'=>$products ,'currs'=>$currs,'places'=>$places]);

}
public function editpro(Request $request){
  $product = Product::Find($request->id);
    $categories = Category::All();
   $currs = Curr::All();
   $places = Place::All();
   return view('products.edit',['product'=>$product,'categories'=>$categories,'currs'=>$currs,'places'=>$places]);
}
public function marksold(Request $request){
  $product = Product::Find($request->input('productID'));
  $product->is_sold = 1;
  $product->save();
  return response()->json(['issold'=>$product->is_sold]);
}
public function marknotsold(Request $request){
  $product = Product::Find($request->input('productID'));
  $product->is_sold = 0;
  $product->save();
  return response()->json(['issold'=>$product->is_sold]);
}

}
