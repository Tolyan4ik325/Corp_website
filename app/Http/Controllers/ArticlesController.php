<?php

namespace Corp\Http\Controllers;

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
}
