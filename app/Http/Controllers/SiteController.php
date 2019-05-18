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

    protected $vars;

    protected $contentRightBar = FALSE;
    protected $contentLeftBar = FALSE;

    protected $bar = FALSE;

    public function __construct() {
    	
    }
}
