<?php

namespace Corp\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Gate;

use Corp\Repositories\ArticlesRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

use Illuminate\Http\Request;

use Corp\Http\Requests;
use Corp\Http\Controllers\Controller;

use Corp\Category;
use Corp\Article;

use Corp\Http\Requests\ArticleRequest;
class ArticlesController extends AdminController
{

    public function __construct(ArticlesRepository $a_rep) {
        
        $this->role = 'VIEW_ADMIN_ARTICLES';

        parent::__construct();
        
        // 
        $this->template = env('THEME').'.admin.articles';
        
        $this->a_rep = $a_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->title = 'Менеджер статтей';

        $articles = $this->getArticles();

        $this->content = view(env('THEME').'.admin.articles_content')->with('articles', $articles)->render();

        return $this->renderOutput();
    }

     public function getArticles()
    {
        //

        return $this->a_rep->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Gate::denies('save', new \Corp\Article)) {
            abort(403);
        }

        $this->title = "Добавить новый материал";

        $categories = Category::select(['title', 'alias','parent_id', 'id'])->get();
        

        $lists = array();

        foreach ($categories as $category) {
            if($category->parent_id == 0) {
                $lists[$category->title] = array();
            }

            else {
                $lists[$categories->where('id', $category->parent_id)->first()->title][$category->id] = $category->title;
            }
        }
        $this->content = view(env('THEME').'.admin.articles_create_content')->with('categories', $lists)->render();
        
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //

        $result = $this->a_rep->addArticle($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //

      // $article =  Article::where('alias', $alias);
        if(Gate::denies('edit', new Article)) {
            abort(403);
        }
        $article->img = json_decode($article->img);

        $categories = Category::select(['title', 'alias','parent_id', 'id'])->get();
        

        $lists = array();

        foreach ($categories as $category) {
            if($category->parent_id == 0) {
                $lists[$category->title] = array();
            }

            else {
                $lists[$categories->where('id', $category->parent_id)->first()->title][$category->id] = $category->title;
            }
        }

        $this->title = 'Редактирование материала - '. $article->title;

         $this->content = view(env('THEME').'.admin.articles_create_content')->with(['categories' => $lists, 'article' => $article])->render();
        
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //

        $result = $this->a_rep->updateArticle($request, $article);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect('/admin')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
