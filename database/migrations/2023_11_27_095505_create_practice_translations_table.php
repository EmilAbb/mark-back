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
        Schema::create('practice_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practice_id')->unsigned();
            $table->text('title');
            $table->text('text');
            $table->string('locale')->index();
            $table->unique(['practice_id','locale']);
            $table->foreign('practice_id')->references('id')->on('practice')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_translations');
    }
};
