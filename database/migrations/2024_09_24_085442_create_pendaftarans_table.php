<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peserta_id');
            $table->foreignId('user_id');
            $table->foreignId('pelatihan');
            $table->string('tanggal_daftar');
            $table->timestamps();
        });
        Schema::table('pendaftarans',function(Blueprint $table){
            $table->foreign('peserta_id')->references('id')->on('pesertas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('pendaftarans', function(Blueprint $table) {
            $table->dropForeign('pendaftarans_peserta_id_foreign');
        });

        Schema::table('pendaftarans', function(Blueprint $table) {
            $table->dropIndex('pendaftarans_peserta_id_foreign');
        });

        Schema::table('pendaftarans', function(Blueprint $table) {
            $table->dropForeign('pendaftarans_user_id_foreign');
        });

        Schema::table('pendaftarans', function(Blueprint $table) {
            $table->dropIndex('pendaftarans_user_id_foreign');
        });
              
        Schema::dropIfExists('pendaftarans');
    }
};
