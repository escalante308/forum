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
        Schema::create('post_response_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_response_id');
            $table->unsignedBigInteger('image_id');
            $table->timestamps();

            $table->foreign('post_response_id')->references('id')->on('post_responses');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_response_images');
    }
};
