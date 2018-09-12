<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;
use App\Procategory;

class Product extends Model
{
    //
    public function users()
    {
    	return $this->belongsTo(User::class);
    }

    public function categories()
    {
    	return $this->belongsTo(Procategory::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
