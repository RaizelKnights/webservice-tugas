<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable =
    [
        'judul',
        'penerbit',
        'penulis',
        'isbn',
        'harga',
        'tahun',
        'sinopsis',
    ];
}
