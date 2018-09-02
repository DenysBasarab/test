<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;


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
        $articles = Article::paginate(5);

        return view('home')->with(['articles'=>$articles]);
    }

    public function show($id)
    {
        $article = Article::select(['id','title','description','name','created_at'])->where('id', $id)->first();

        return view('article-content')->with(['article'=>$article]);
    }


    public function add()
    {
        return view('edit');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'name' => 'required'
        ]);

        $data = $request->all();
        $article = new Article;
        $article->fill($data);

        $article->save();

        return redirect('/home');
    }

}
