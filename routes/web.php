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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
    //return 'weel';
});

Route::get('/posts/{id}','Posts@index');

Route::get('/insert',function (){
 $b = DB::insert('insert 
 into Comments(user_name,body) values(?,?) ',['ali4','welcome']);
 if($b==true)
     return 'sucess';
 else
     return 'failed';
});
use App\Comment;

Route::get('/insert2',function (){
    $c = new Comment();
    $c->user_name = 'fathy';
    $c ->body = '10ahh';
    $result = $c->save();
    if ($result)
        return 'sucess';
});

/*
Route::get('/read',function (){
    $result = DB::select('select * from Comments where id=?',[1]);
    return $result;
});*/

Route::get('/read',function (){
    $result = Comment::all();
    return $result;
});

Route::get('/read/{id}',function ($id){
    $result = Comment::find($id);
    return $result;
});

Route::get('/find',function (){
    $result = Comment::where('body','welcome')->get();
    return $result;
});

Route::get('/find2',function (){
    $result = Comment::where('body','welcome')->orderBy('id','desc')->take(1)->get();
    return $result;
});

Route::get('/find3',function (){
    $result = Comment::where('body','welcome')->orderBy('id')->take(1)->get();
    return $result;
});
