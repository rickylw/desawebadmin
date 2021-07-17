<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_profil';
    protected $primaryKey = 'id';
}
