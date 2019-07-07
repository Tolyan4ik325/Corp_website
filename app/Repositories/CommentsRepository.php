<?php
namespace Corp\Repositories;

use Corp\Comments;

class CommentsRepository extends Repository{

	public function __construct(Comments $comments) {
		$this->model = $comments;
	}

}

?>