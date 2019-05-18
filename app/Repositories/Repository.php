<?php
namespace Corp\Repositories;

use Config;

class Repository {
	protected $model = FALSE;

	public function get() {

		$builder = $this->model->select('*');

		return $builder->get();
	}
}

?>