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
        Schema::create('comic_pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('comic_id')->constrained()->onDelete('cascade');
            $table->integer('page_number');
            $table->string('filename')->nullable();

            $table->unique(['comic_id', 'page_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_pages');
    }
};
