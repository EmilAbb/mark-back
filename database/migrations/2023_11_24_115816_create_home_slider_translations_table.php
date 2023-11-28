<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_slider_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_slider_id')->unsigned();
            $table->text('title');
            $table->text('text');
            $table->string('locale')->index();
            $table->unique(['home_slider_id','locale']);
            $table->foreign('home_slider_id')->references('id')->on('homeSlider')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_slider_translations');
    }
};
