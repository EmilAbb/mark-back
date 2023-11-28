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
        Schema::create('about_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_id')->unsigned();
            $table->text('link');
            $table->string('locale')->index();
            $table->unique(['about_id','locale']);
            $table->foreign('about_id')->references('id')->on('about')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_translations');
    }
};
