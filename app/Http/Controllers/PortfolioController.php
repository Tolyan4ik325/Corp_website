<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\MenusRepository;

use Corp\Repositories\PortfoliosRepository;

class PortfolioController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep) {
        
        parent::__construct(new MenusRepository(new \Corp\Menu));
        
        $this->p_rep = $p_rep;
        $this->template = env('THEME').'.portfolios';
        
    }

     public function index()
    {
        //
        

    	$this->title = 'Портфолио';
    	$this->keywords = 'Портфолио';
    	$this->meta_desc = 'Портфолио';

    	$portfolios = $this->getPortfolios();

    	// dd($portfolios);

        
         $content = view(env('THEME').'.portfolios_content')->with('portfolios', $portfolios)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
   
    }

    public function getPortfolios($take = FALSE, $paginate = TRUE) {
    	$portfolios = $this->p_rep->get('*', $take, $paginate);
    	if($portfolios) {
    		$portfolios->load('filter');
    	}

    	return $portfolios;
    }

    public function show($alias) {

    	$portfolio = $this->p_rep->one($alias);
    	$portfolios = $this->getPortfolios(config('settings.other_portfolios'), FALSE);

        $this->title = $portfolio->title;
        $this->keywords = $portfolio->keywords;
        $this->meta_desc = $portfolio->meta_desc;

        $content = view(env('THEME').'.portfolio_content')->with(['portfolio' => $portfolio, 'portfolios' => $portfolios])->render();
        $this->vars = array_add($this->vars, 'content', $content);

        

        // dd($portfolios);

        return $this->renderOutput();
     }
}
