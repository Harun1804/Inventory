<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_transaksi';
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
