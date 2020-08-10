<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Produk;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
