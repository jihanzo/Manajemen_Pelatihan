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
        Schema::create('dokumentasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelatihan_id');
            $table->string('foto');
            $table->timestamps();
        });
        Schema::table('dokumentasis',function(Blueprint $table){
            $table->foreign('pelatihan_id')->references('id')->on('pelatihans')
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
        Schema::table('dokumentasis', function(Blueprint $table) {
            $table->dropForeign('dokumentasis_pelatihan_id_foreign');
        });

        Schema::table('dokumentasis', function(Blueprint $table) {
            $table->dropIndex('dokumentasis_pelatihan_id_foreign');
        });
              
        Schema::dropIfExists('dokumentasis');
    }
};
