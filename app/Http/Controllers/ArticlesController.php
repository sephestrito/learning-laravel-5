<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;

class ArticlesController extends Controller
{
    /**
     * Articles Controller middleware authentication::jce f
     */
    public function __construct()
    {
        /**
         * for every single route of articles controller
         * $this->middleware('auth');
         */
        
        /**
         * for specific method within controller
         */
        $this->middleware('auth', ['only'=> 'create']);

        /**
         * for except on specific method within controller
         * $this->middleware('auth', ['except'=> 'index']);
         */

    }

    public function index()
    {
    	
        /*
            for getting user()->name;
         */
         /*return \Auth::user()->name;*/



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
        /*
        *** Testing for Guest using Authentication... pre middleware //jce
        if(Auth::guest()){
            return redirect('articles');
        }
        */

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
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);
        

        /*Article::create($request->all());*/

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
