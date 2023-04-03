<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function __construct()
    {


    }

    public function index (){

        $articles = Article::take(3)->orderBy('id','DESC')->get();

        return view('index',compact('articles'));
    }


    public function contact()
    {

        $message = ("Palese fill in the form ");

        $info = "Remember , we only work  on Mondays";
        $user = \Auth::user();

        $options = [
            'genral' => 'Genral message',
            'development'=>'Web development',
            'consultation'=>'Consultation'
        ];

        return view('contact', compact('message', 'info','user','options'));
    }

    public function storeContact(Request $request)
    {

        $validateData = $request->validate([
            'sender_name' => 'required|max:10',
            'message' => 'required|min:50'
        ]);

//    dd($request->sender_name);
//    عرض الاسم الي ينحفظ ستيشن

        $request->session()->put('username', $request->sender_name);
        return 'done!';
    }

    public function about()
    {


        return view('about');
    }
}
