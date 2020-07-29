<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barang_masuk';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
