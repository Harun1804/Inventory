<?php

namespace App\Model;

use App\User;
use App\Model\Kategori;
use Illuminate\Database\Eloquent\Model;
use App\Model\Transaksi;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = ['alamat', 'telepon', 'user_id','kategori_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
