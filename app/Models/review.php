<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'user_name', 'rating', 'comment'];

    public function book()
    {
        return $this->belongsTo('book', 'book_id', 'id');
    }
}
