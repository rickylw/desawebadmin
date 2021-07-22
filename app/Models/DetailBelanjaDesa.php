<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBelanjaDesa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_detail_belanja_desa';
    protected $primaryKey = 'id';
}
