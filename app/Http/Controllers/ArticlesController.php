<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Auth;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;

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

    	return view('articles.index', compact('articles','latest'));

    }
    
    /*public function show($id)*/
    public function show(Article $article)
    {
    	/*$article = Article::findOrFail($id);*/

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
       
       $tags = Tag::lists('name','id');

    	return view('articles.create',compact('tags'));
    }

    
    /*public function store(Request $request)*/
    public function store(ArticleRequest $request)
    {

        /*$this->validate($request, [
                'title' => 'required|min:3',
                'body' => 'required',
                'published_at' => 'required|date'
            ]);*/
        /*Article::create($request->all());*/

        /**
         * This
         * $article = new Article($request->all());
         * Auth::user()->articles()->save($article);
         *
         * is same as this below //jce
         * Auth::user()->articles()->create($request->all());
         */
    

        $this->createArticle($request);

        Flash::info('Your Article has been created');

        return redirect('articles');
    }

    public function edit(Article $article)
    {
        $tags = Tag::lists('name','id');
        
        return view('articles.edit',compact('article','tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());
        $tag_list = (array) $request->input('tag_list');
        $this->syncTags($article, $tag_list);


        return redirect('articles');
    }
    /**
     * Sync up tags in the database
     * @param  Article $article 
     * @param  array   $tags    
     * @return App\Article
     */
    private function syncTags(Article $article, array $tags)
    {
        if(!empty($tags))
        {
            $article->tags()->sync($tags);    
        }
        else
        {
            $article->tags()->detach();
        }
        
    }

    /**
     * Save a new article
     * @param  ArticleRequest $request [description]
     * @return $article                  article object;
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());


        $tag_list = (array) $request->input('tag_list');
        $this->syncTags($article, $tag_list);

        return $article;
    }

   
}