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
        Schema::create('footer_menu_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('footer_menu_id')->unsigned();
            $table->text('title');
            $table->string('locale')->index();
            $table->unique(['footer_menu_id','locale']);
            $table->foreign('footer_menu_id')->references('id')->on('footer_menu')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_menu_translations');
    }
};
