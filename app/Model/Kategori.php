<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Produk;
use App\Model\Supplier;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function supplier()
    {
        return $this->hasMany(Supplier::class);
    }
}
