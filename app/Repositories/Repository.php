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

		return $this->check($builder->get());
	}


	protected function check($result) {

		if($result->isEmpty()) {
			return FALSE;
		}

		$result->transform(function($item, $key) {

			$item->img = json_decode($item->img);

			return $item;

		});

		return $result;

	}
}

?>