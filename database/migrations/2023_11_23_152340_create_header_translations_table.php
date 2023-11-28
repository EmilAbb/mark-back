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
        Schema::create('header_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('header_id')->unsigned();
            $table->text('header_name');
            $table->text('header_name_text');
            $table->text('header_title');
            $table->text('header_phone_title');
            $table->string('locale')->index();
            $table->unique(['header_id','locale']);
            $table->foreign('header_id')->references('id')->on('header')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_translations');
    }
};
