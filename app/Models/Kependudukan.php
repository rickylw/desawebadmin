<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_data_kependudukan_desa';
    protected $primaryKey = 'id';
}
