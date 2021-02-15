<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'categories_id', 'tite', 'description', 'image'
    ];

    public function categories() {
        return $this->belongsToMany('App\Category');
    }
}
