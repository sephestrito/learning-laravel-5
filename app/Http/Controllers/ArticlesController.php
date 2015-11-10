<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
    	
        /*$articles = Article::order_by('published_at','desc')->get();*/
        /*$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();*/
        $articles = Article::latest('published_at')->published()->get();

    	return view('articles.index', compact('articles'));

    }

    public function show($id)
    {
    	$article = Article::findOrFail($id);

        /*dd($article->created_at->year);
        dd($article->created_at->month);
        dd($article->created_at->addDays(8)->format('Y-m'));
        dd($article->created_at->addDays(6)->diffForHumans());
        dd($article->published_at);*/

    	/* if try

    	if (is_null($article)){
    		abort(404);
    	}
    	*/

    	return view('articles.show', compact('article'));
    }

    public function create()
    {
    	return view('articles.create');
    }

    
    /*public function store(Request $request)*/
    public function store(ArticleRequest $request)
    {

        /*$this->validate($request, [
                'title' => 'required|min:3',
                'body' => 'required',
                'published_at' => 'required|date'
            ]);*/

        Article::create($request->all());

        return redirect('articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit',compact('article'));
    }

    public function update($id, ArticleRequest $request)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect('articles');
    }

   
}
