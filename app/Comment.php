<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article() {
    	return $this->belongsTo('Corp\Article');
    }
    public function user() {
    	return $this->belongsTo('Corp\User');
    }
}
