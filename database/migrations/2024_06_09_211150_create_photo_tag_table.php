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
        Schema::create('photo_tag', function (Blueprint $table) {

            $table->unsignedBigInteger('photo_id');

            $table->foreign('photo_id')->references('id')->on('photos')->cascadeOnDelete();

            $table->unsignedBigInteger('tag_id');

            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_tag');
    }
};
