<?php
namespace Corp\Repositories;

use Corp\Article;

class ArticlesRepository extends Repository{

	public function __construct(Article $articles) {
		$this->model = $articles;
	}

	public function one($alias, $attr = array()) {
		$article = parent::one($alias, $attr);

		if($article && !empty($attr)) {
			$article->load('comments');
			$article->comments->load('user');
		}

		return $article;
	}

}

?>