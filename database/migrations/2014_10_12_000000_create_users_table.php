<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@p.com',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ], [
                'name' => 'Petugas Gudang',
                'email' => 'pg@p.com',
                'password' => bcrypt('pg'),
                'role' => 'pg'
            ], [
                'name' => 'Pemilik',
                'email' => 'pemilik@p.com',
                'password' => bcrypt('pemilik'),
                'role' => 'pemilik'
            ], [
                'name' => 'pembeli',
                'email' => 'pembeli@p.com',
                'password' => bcrypt('pembeli'),
                'role' => 'pembeli'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
