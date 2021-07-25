<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_galeri';
    protected $primaryKey = 'id';
}
