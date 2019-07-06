<?php
namespace Corp\Repositories;

use Corp\Articles;

class ArticlesRepository extends Repository{

	public function __construct(Articles $articles) {
		$this->model = $articles;
	}

}

?>