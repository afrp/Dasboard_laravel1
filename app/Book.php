<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use softDeletes;
    public function categories(){
        return $this->belongsToMany('App\Category');
      }
      public function orders(){
        return $this->belongsToMany('App\Order');
      }
      protected $fillable = [
        'title', 'slug', 'description', 'author', 'publisher',
        'cover', 'price', 'weight', 'stock', 'status'
    ];
}
