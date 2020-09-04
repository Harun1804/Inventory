<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_permintaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('jumlah_permintaan');
            $table->unsignedInteger('jumlah_dikirim')->nullable();
            $table->unsignedInteger('status_produk');
            $table->string('kondisi_produk')->nullable();
            $table->string('alasan')->nullable();
            $table->string('rak')->nullable();
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->date('tgl_masuk_rak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_permintaan', function (Blueprint $table) {
            $table->dropForeign(['transaksi_id']);
            $table->dropForeign(['produk_id']);
        });
        Schema::dropIfExists('detail_permintaan');
    }
}
