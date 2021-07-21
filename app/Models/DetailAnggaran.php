<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAnggaran extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_detail_anggaran';
    protected $primaryKey = 'id';
}
