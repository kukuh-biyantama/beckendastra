<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\kategoribuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\transaksi;

class ApiController extends Controller
{
    //kategori API
    public function indexkategori()
    {

        $data = kategoribuku::all();
        return response()->json(['data' => $data]);
    }

    public function postkategori(Request $request)
    {
        $postdata = $request->all();
        DB::table('kategoribukus')->insert([
            'nama_buku' => $postdata['nama_buku'], // Replace 'column1' with the actual column name
            'jenis_buku' => $postdata['jenis_buku'],
            'gambar' => $postdata['gambar'] // Replace 'column2' with the actual column name
            // Add more columns and their corresponding values as needed
        ]);
        return response()->json(['massage' => 'succesfully']);
    }

    public function editkategori($id)
    {
        $data = kategoribuku::find($id);
        return response()->json(['data' => $data]);
    }

    public function updatekategori(Request $request, $id)
    {
        $getData = kategoribuku::find($id);
        $updateData = $request->all();
        $getData->update([
            'nama_buku' => $updateData['nama_buku'], // Replace 'column1' with the actual column name
            'jenis_buku' => $updateData['jenis_buku'],
            'gambar' => $updateData['gambar']
        ]);
        return response()->json(['massage' => 'succesfully']);
    }

    public function deletekategori($id)
    {
        $getData = kategoribuku::find($id);
        $getData->delete();
        return response()->json(['massage' => 'succesfully']);
    }

    //books
    public function indexbooks()
    {
        $data = book::with('kategoribuku')->get();
        $customData = $data->map(function ($book) {
            return [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'description' => $book->description,
                'price' => $book->price,
                'published_date' => $book->published_date,
                'image' => $book->image,
                'kategori' => $book->kategoribuku->jenis_buku,
                'rating' => $book->rating,
                // Tambahkan properti lain yang Anda inginkan
            ];
        });

        return response()->json(['data' => $customData]);
    }

    public function booksstore(Request $request)
    {
        $postdata = $request->all();
        book::create([
            'id_kategori' => $postdata['id_kategori'], // Replace 'column1' with the actual column name
            'title' => $postdata['title'],
            'author' => $postdata['author'],
            'description' => $postdata['description'],
            'price' => $postdata['price'],
            'published_date' => $postdata['published_date'],
            'image' => $postdata['image']
        ]);
        return response()->json(['massage' => 'succesfully']);
    }

    public function editbooks(Request $request, $id)
    {
        $data = book::find($id);
        return response()->json(['data' => $data]);
    }

    public function updatebooks(Request $request, $id)
    {
        $getData = book::find($id);
        $postdata = $request->all();
        $getData->update([
            'id_kategori' => $postdata['id_kategori'], // Replace 'column1' with the actual column name
            'title' => $postdata['title'],
            'author' => $postdata['author'],
            'description' => $postdata['description'],
            'price' => $postdata['price'],
            'published_date' => $postdata['published_date'],
            'image' => $postdata['image']
        ]);
        return response()->json(['massage' => 'succesfully']);
    }

    public function deletebooks($id)
    {
        $getData = book::find($id);
        $getData->delete();
        return response()->json(['massage' => 'succesfully']);
    }


    //transaksi
    public function indextransaksi()
    {
        $data = transaksi::with('books', 'users')->get();
        $customData = $data->map(function ($transaksi) {
            return [
                'id' => $transaksi->id,
                'nama_pembeli' => $transaksi->nama_pembeli,
                'judul_buku' => $transaksi->books->judul_buku,
                'jenis_buku' => $transaksi->books->jenis_buku,
                'alamat_pengiriman' => $transaksi->alamat_pengiriman,
                'total_buku' => $transaksi->total_buku,
                'biaya' => $transaksi->biaya,
                'status' => $transaksi->status
            ];
        });

        return response()->json(['data' => $customData]);
    }

    public function deletetransaksi(Request $request, $id)
    {
        $data = transaksi::find($id);
        $data->delete();
        return response()->json(['massege' => 'success']);
    }

    public function updatetransaksi(Request $request, $id)
    {
        $getData = transaksi::find($id);
        $postdata = $request->all();
        $getData->update([
            'status' => $postdata['status'], // Replace 'column1' with the actual column name
        ]);
        return response()->json(['massage' => 'succesfully']);
    }
}
