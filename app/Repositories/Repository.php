<?php
namespace Corp\Repositories;

use Config;

class Repository {
	protected $model = FALSE;

	public function get($select = "*", $take = FALSE) {

		$builder = $this->model->select($select);

		if($take) {
			$builder->take($take);
		}

		return $builder->get();
	}
}

?>