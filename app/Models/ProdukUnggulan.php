<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukUnggulan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_produk_unggulan';
    protected $primaryKey = 'id';
}
