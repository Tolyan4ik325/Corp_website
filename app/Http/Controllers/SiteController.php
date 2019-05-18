<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //

    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;


    protected $template;

    protected $vars = array();

    protected $contentRightBar = FALSE;
    protected $contentLeftBar = FALSE;

    protected $bar = FALSE;

    public function __construct() {

    }

    protected function renderOutput() {

    	$navigation = view(env('THEME').'.navigation')->render();
    	$this->vars = array_add($this->vars, 'navigation', $navigation);

    	return view($this->template)->with($this->vars);

    }
}
