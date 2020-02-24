<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];
    // for join post model with many user
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
