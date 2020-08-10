<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailPermintaan extends Model
{
    protected $table = 'detail_permintaan';
    protected $fillable = ['jumlah_permintaan', 'transaksi_id', 'produk_id', 'status_produk', 'rak'];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
