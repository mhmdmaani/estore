<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/products','ProductsController');
Route::resource('/currs','CurrsController');
Route::resource('/categories','CategoriesController');
Route::resource('/places','PlacesController');
Route::resource('/tags','TagsController');
Route::resource('/media','MediaController');
Route::resource('/users','UserController');
Route::post('/products/searchbyid','ProductsController@searchbyid')->middleware(auth::class);
Route::post('/products/searchbyname','ProductsController@searchbyname')->middleware(auth::class);
Route::post('/products/xsearch','ProductsController@xsearch')->middleware(auth::class);
Route::get('/product/{id}/disapprove','ProductsController@disapprove');
Route::get('/product/{id}/approve','ProductsController@approve');
Route::get('/user/{id}/disapprove','UserController@disapprove');
Route::get('/user/{id}/approve','UserController@approve');
Route::post('/addmessage/{id}','MessagesController@sendsms');
Route::get('/addmessage/{id}','MessagesController@sendsms');
Route::post('newchat','MessagesController@newchat');
Route::get('newchat','MessagesController@newchat');
Route::post('latestsms/{id}','MessagesController@latestsms');
Route::get('latestsms','MessagesController@latestsms');
Route::get('panel','PanelController@index');
Route::get('/prochats/{id}','ProductsController@prochats');
/*home routes*/
Route::get('homesearch','HomeController@xsearch');
Route::post('/addtowish/{id}','HomeController@addproducttosaved');
Route::get('/addtowish/{id}','HomeController@addproducttosaved');
Route::post('/removefromwish/{id}','HomeController@deleteproductfromsaved');
Route::get('/removefromwish/{id}','HomeController@deleteproductfromsaved');
/*public pages*/
Route::get('/myads','HomeController@myads');
Route::get('/savedads','HomeController@savedads');
Route::get('/item/{id}','HomeController@viewProduct');
Route::get('/category/{id}' ,'HomeController@getcategory');
Route::get('/tag/{id}' ,'HomeController@gettag');
/*End public pages*/
/*send report ajax*/
Route::post('/sendreport','ReportsController@store');
Route::get('/sendreport','ReportsController@store');
/* end send report ajax*/

/*send Email ajax*/
Route::get('/sendmail',function(Illuminate\Http\Request $request,Illuminate\Mail\Mailer $mailer){
  $mailer->to($request->input('to'))
        ->send(new App\Mail\ProMail($request->input('title'),$request->input('sender'),$request->input('body')));
return response()->json(['state'=>'sent']);
});
Route::post('/sendmail',function(Illuminate\Http\Request $request,Illuminate\Mail\Mailer $mailer){
  $to = $request->input('to');
  $mailer->to($to)
        ->send(new App\Mail\ProMail($request->input('title'),$request->input('title'),$request->input('body')));
return response()->json(['state'=>'sent']);
});
/* end send Email ajax*/
