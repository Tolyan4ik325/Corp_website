<?php
namespace Corp\Repositories;

use Corp\Permission;

class PermissionsRepository extends Repository{

	public function __construct(Permission $permission) {
		$this->model = $permission;
	}

}

?>