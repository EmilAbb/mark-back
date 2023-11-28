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
        Schema::create('legal_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('legal_id')->unsigned();
            $table->text('title');
            $table->string('locale')->index();
            $table->unique(['legal_id','locale']);
            $table->foreign('legal_id')->references('id')->on('legal')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_translations');
    }
};
