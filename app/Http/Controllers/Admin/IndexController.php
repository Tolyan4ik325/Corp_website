<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Corp\Http\Requests;
use Corp\Http\Controllers\Controller;
use Gate;

class IndexController extends AdminController
{
    //
    // protected $role;

    public function __construct() {
		
    	$this->role = 'VIEW_ADMIN';
		parent::__construct();
		 
		// 
		$this->template = env('THEME').'.admin.index';
		
	}
	
		
	public function index() {
		$this->title = 'Панель администратора';
		
		return $this->renderOutput();
		
	}
}
