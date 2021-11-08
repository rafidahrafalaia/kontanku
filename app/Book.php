<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    
    public function borrow()
    {
      return $this->hasMany(Borrow::class);
    }
    
    protected $fillable = ['user_id', 'title', 'description'];
}
