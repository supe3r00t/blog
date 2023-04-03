<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $articles =Article::orderBy('id','DESC')->get();

        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('title','id');


     return view('articles.create',compact('categories'));
    }


//
////    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'max:50|min:20|required',
            'content' => 'min:140|required',
            'categories' =>'required'
            ]);

        $user = Auth::User();


        $categories =array_values($request->categories);




        $article  =  $user->articles()->create($request->except('categories'));


        $article->categories()->attach($categories);




        return redirect()->to('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (Auth::id() != $article->user_id){

            return abort(401);
        }

        $categories = Category::all()->pluck('title','id');

        $articleCategories = $article->categories()->pluck('id')->toArray();

        return view('articles.edit',compact('categories','article','articleCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
//        $article->title = $request['title'];
//        $article->content = $request ['content'];
//        $article->save();      اختصار لنا بما انا حاطين في الموديل سماح يسمح بالتعدل بسطر واحد تحت


        if (Auth::id() != $article->user_id){

            return abort(401);
        }

        $request->validate([
            'title' => 'max:50|min:20|required',
            'content' => 'min:140|required',
            'categories' =>'required'
        ]);

        $article->update($request->all());

        $article->categories()->sync($request->categories);
        // هذا لمزامنة بين القواعد والعلاقات

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        if (Auth::id() != $article->user_id){

            return abort(401);
        }


        $article->delete();
        return redirect()->back();
    }

    private function articles()
    {
    }
}
