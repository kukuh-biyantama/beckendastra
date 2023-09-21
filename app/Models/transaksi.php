<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';

    protected $fillable = [
        'id_books', 'id_users',
        'nama_pembeli', 'alamat_pengiriman',
        'total_buku', 'biaya', 'status'
    ];

    public function books()
    {
        return $this->belongsTo(book::class, 'id_books');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
