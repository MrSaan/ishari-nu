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
        Schema::create('muhuds', function (Blueprint $table) {
            $table->id();
            $table->string('name_short');
            $table->string('name_long');
            $table->string('numberOfShalawat')->nullable();
            $table->string('transliteration_arab')->nullable();
            $table->string('transliteration_id')->nullable();
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
        Schema::dropIfExists('muhuds');
    }
};
