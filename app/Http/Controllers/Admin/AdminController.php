<?php

namespace Corp\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Corp\Http\Requests;
use Corp\Http\Controllers\Controller;

use Gate;

use Menu;

class AdminController extends \Corp\Http\Controllers\Controller
{
    //
    
    protected $p_rep;
    
    protected $a_rep;
    
    protected $user;

    protected $menu;
    
    protected $template;
    
    protected $content;
    
    protected $title;
    
    protected $role;

    protected $vars;

    public function __construct() {
            
            $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if(Gate::denies($this->role)) {
            abort(403);
            }

            return $next($request);
            if(!$this->user) {
            abort(403);
            }
            
        });

        }
   
    public function renderOutput() {
        $this->vars = array_add($this->vars,'title',$this->title);
        
        $menu = $this->getMenu();
        
        $navigation = view(env('THEME').'.admin.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);
        
        if($this->content) {
            $this->vars = array_add($this->vars,'content',$this->content);
        }
        
        $footer = view(env('THEME').'.admin.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);
        
        return view($this->template)->with($this->vars);
        
        
        
        
    }
    
    public function getMenu() {
        return Menu::make('adminMenu', function($menu) {
            
            $menu->add('Статьи',array('route' => 'admin.articles.index'));
            
            $menu->add('Портфолио',  array('route'  => 'admin.articles.index'));
            $menu->add('Меню',  array('route'  => 'admin.menus.index'));
            $menu->add('Пользователи',  array('route'  => 'admin.articles.index'));
            $menu->add('Привилегии',  array('route'  => 'admin.permissions.index'));
            
            
        });
    }
    
    
}
