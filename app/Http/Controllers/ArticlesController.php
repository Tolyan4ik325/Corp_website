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
        dd($articles);


        return $this->renderOutput();

    }

    public function getArticles($alias = FALSE) {

    	$articles = $this->a_rep->get(['title', 'alias', 'created_at', 'img', 'desc'], FALSE, TRUE);
    	// if($articles) {
    	// 	// $articles->load('user', 'category', 'comments');
    	// }
    }
}
