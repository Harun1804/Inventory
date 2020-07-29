<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produk';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function barangmasuk()
    {
        return $this->hasOne(BarangMasuk::class);
    }

    public function stok()
    {
        return $this->hasOne(Stok::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
