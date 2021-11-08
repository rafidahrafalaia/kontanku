<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
    public function book()
    {
      return $this->belongsTo(Book::class);
    }

    protected $fillable = ['book_id', 'user_id'];
}
