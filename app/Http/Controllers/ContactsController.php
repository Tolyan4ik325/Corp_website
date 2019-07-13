<?php

namespace Corp\Http\Controllers;
use Corp\Repositories\MenusRepository;
use Illuminate\Http\Request;

class ContactsController extends SiteController
{
    //
     public function __construct() {
        
        parent::__construct(new MenusRepository(new \Corp\Menu));
        
        $this->bar = 'left';

        $this->template = env('THEME').'.contacts';
        
    }

    public function index(Request $request) {

    	$this->title = 'Контакты';

    	$content = view(env('THEME').'.contact_content')->render();
    	$this->vars = array_add($this->vars, 'content', $content);

    	$this->contentLeftBar = view(env('THEME').'.contact_bar')->render();
    	$this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }
}
