<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['id_kategori', 'title', 'author', 'description', 'price', 'published_date', 'image'];

    public function kategoribuku()
    {
        return $this->belongsTo(kategoribuku::class, 'id_kategori', 'id');
    }
}
