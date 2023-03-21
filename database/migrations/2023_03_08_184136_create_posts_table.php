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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_name');
            $table->string('post_title');
            $table->integer('category_id');
            $table->integer('location_id');
            $table->integer('sub_location_id');
            $table->integer('price');
            $table->string('condition');
            $table->string('brand');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('post_image')->nullable();
            $table->tinyInteger('active');
            $table->integer('view_count')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
