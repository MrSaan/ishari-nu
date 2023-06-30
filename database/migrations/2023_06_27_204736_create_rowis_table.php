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
        Schema::create('rowis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('muhud_id')->constrained();
            $table->foreignId('rowi_audio_id')->constrained();
            $table->string('text_rowi');
            $table->string('transliteration')->nullable();
            $table->string('translation_id')->nullable();
            $table->string('translation_en')->nullable();
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
        Schema::dropIfExists('rowis');
    }
};
