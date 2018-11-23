<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = []; // ini digunakan untuk label yg banyak, jadi kamu tidak perlu menuliskan semua nama labelmu
    //protected $fillable = ['title', 'description', 'price', 'stock'];
}
 