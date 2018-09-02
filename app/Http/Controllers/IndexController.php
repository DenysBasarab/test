<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class IndexController extends Controller
{


    public function index()
    {

        $articles = Article::paginate(5);

        return view('welcome')->with(['articles'=>$articles]);
    }


}
