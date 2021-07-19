<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_kategori_berita';
    protected $primaryKey = 'id';
}
