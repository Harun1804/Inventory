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
        // DB::unprepared('
        // CREATE TRIGGER barang_datang after UPDATE ON detail_permintaan
        //     FOR EACH ROW BEGIN
        //     INSERT INTO produk SET
        //     id = new.produk_id, stok=New.jumlah_dikirim
        //     ON DUPLICATE KEY UPDATE stok=stok+New.jumlah_dikirim;
        // END
        // ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::unprepared('DROP TRIGGER `barang_datang`');
    }
}
