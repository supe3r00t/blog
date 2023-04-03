<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\x;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class,'index'])->name('index');

Route::get('contact',[PageController::class,'contact']);

Route::get('about',[PageController::class,'about']);


Route::get('ahmed', function (){
echo 'yes';
});
//Route::get('contact' ,  function (){
//   return view('contact');
//});
Route::post('contact',function (){
   echo "done";
});

Route::get('ahmed',function (){
    return view('ahmed');
});

Route::post('contact',[PageController::class,'storeContact']);
//Route::get('contact','PageController');

Route::get('system-closed', function (){

    return"Sorry , we only work on Mondays !";

});

Route::get('users/{id}',function ($id){
    echo "Users id welcome :$id";

});

Route::get('users/{id?}/email/{email?}',function ($id = null , $email = null) {
    echo "users id weclome: " . $id . "and email is  : $email";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('articles','App\Http\Controllers\ArticleController');

Route::post('comments/{article}',[CommentController::class,'store'])->name('comments.store');
