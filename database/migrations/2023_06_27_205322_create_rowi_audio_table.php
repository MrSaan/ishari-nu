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
        Schema::create('rowi_audio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('muhud_id');
            $table->foreignId('rowi_id');
            $table->foreignId('pimpinan_id');
            $table->string('audio');
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
        Schema::dropIfExists('rowi_audio');
    }
};
