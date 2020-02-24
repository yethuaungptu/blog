<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    // join for customer model with belongs to
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
