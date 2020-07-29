<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER barang_datang after INSERT ON barang_masuk
            FOR EACH ROW BEGIN
            INSERT INTO stok SET
            produk_id = new.produk_id, jumlah_stok=New.jumlah_masuk
            ON DUPLICATE KEY UPDATE jumlah_stok=jumlah_stok+New.jumlah_masuk;
        END
        ');
        DB::unprepared('
        CREATE TRIGGER pengiriman after INSERT ON detail_transaksi
            FOR EACH ROW BEGIN
            UPDATE stok
            SET jumlah_stok = jumlah_stok - NEW.jumlah_transaksi
            WHERE
            produk_id = NEW.produk_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `barang_datang`');
        DB::unprepared('DROP TRIGGER `pengiriman`');
    }
}
