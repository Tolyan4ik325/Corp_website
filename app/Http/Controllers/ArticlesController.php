<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\MenusRepository;

use Corp\Repositories\PortfoliosRepository;

use Corp\Repositories\ArticlesRepository;

use Illuminate\Http\Request;

class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep, ArticlesRepository $a_rep) {
        
        parent::__construct(new MenusRepository(new \Corp\Menu));
        
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        $this->bar = 'right';

        $this->template = env('THEME').'.articles';
        
    }


    public function index()
    {
        //
        
       	$articles = $this->getArticles();

        
         $content = view(env('THEME').'.articles_content')->with('articles', $articles)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $comments = $this->getComments(config('settings.resent_comments'));
        $portfolios = Array();

        $this->contentRightBar = view(env('THEME').'.articlesBar')->with(['comments' => $comments, 'portfolios' => $portfolios]);
        
        return $this->renderOutput();

        

    }

    public function getArticles($alias = FALSE) {
        
        $articles = $this->a_rep->get(['id','title', 'alias', 'created_at', 'img', 'desc', 'user_id', 'category_id'], FALSE, TRUE);
            
        if($articles) {
         // $articles->load('user', 'category', 'comments');
        }

        return $articles;
    }
}
