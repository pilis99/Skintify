<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    protected $table = 'skin';
    protected $fillable = ['nama','jenis','harga','gambar'];    
}
