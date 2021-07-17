<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_organisasi';
    protected $primaryKey = 'id';
}
