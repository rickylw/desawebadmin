<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBelanjaDesa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_kategori_belanja_desa';
    protected $primaryKey = 'id';
}
