<?php
namespace Corp\Repositories;

use Corp\Menu;

class MenusRepository extends Repository{

	public function __construct(Menu $menu) {
		$this->model = $menu;
	}

}

?>