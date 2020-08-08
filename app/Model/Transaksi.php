<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['jenis_transaksi', 'status_transaksi', 'alasan', 'user_id', 'supplier_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function detailtransaksi()
    {
        return $this->hasOne(DetailPermintaan::class);
    }
}
