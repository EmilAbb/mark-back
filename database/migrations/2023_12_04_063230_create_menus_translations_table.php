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
        Schema::create('menus_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->unsigned();
            $table->text('title');
            $table->text('text');
            $table->string('locale')->index();
            $table->unique(['menu_id','locale']);
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus_translations');
    }
};
