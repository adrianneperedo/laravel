<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
