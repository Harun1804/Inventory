<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DetailPermintaan;
use App\Model\Kategori;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailtransaksi()
    {
        return $this->hasOne(DetailPermintaan::class);
    }
}
