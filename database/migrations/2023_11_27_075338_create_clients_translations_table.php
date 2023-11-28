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
        Schema::create('clients_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->text('title');
            $table->text('text');
            $table->string('locale')->index();
            $table->unique(['client_id','locale']);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_translations');
    }
};
