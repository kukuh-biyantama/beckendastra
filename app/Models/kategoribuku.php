<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoribuku extends Model
{
    use HasFactory;
    protected $table = 'kategoribukus';
    protected $fillable = ['nama_buku', 'jenis_buku', 'gambar'];
}
