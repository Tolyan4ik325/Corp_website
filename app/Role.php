<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;
use Permisson;
class Role extends Model
{
    //

    public function users() {
    	return $this->belongsToMany('Corp\User', 'role_user');
    }

    public function perms() {
    	return $this->belongsToMany('Corp\Permission', 'permission_role');
    }
}
