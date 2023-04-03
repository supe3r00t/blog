<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class x extends Controller
{
public function contact(){

    $message =("Palese ");

    $info = "Remember , we only work  on <b>Mondays</b>";

    return view('contact',compact('message','info'));
}

public function storeContact(Request $request){

    $validateData = $request->validate([
      'sender_name'=>'required|max:10',
        'message'=>'required|min:50'
    ]);

//    dd($request->sender_name);
//    عرض الاسم الي ينحفظ ستيشن

    $request->session()->put('username',$request->sender_name);
    return 'done!';
}

public function about(){


    return view('about');
}
}
