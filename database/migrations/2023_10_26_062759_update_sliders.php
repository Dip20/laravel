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
        Schema::table('sliders', function (Blueprint $table) {
            $table->integer('is_deleted')->default(0);
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->decimal('sale_price', 19,2);
            $table->decimal('mrp', 19,2);
            $table->integer('category', 11);
            $table->longText('description');
            $table->string('img', 500);
            $table->integer('is_active', 1)->default(0);
            $table->integer('is_deleted', 1)->default(0);
            $table->string('created_at', 255);
            $table->string('created_by', 255);
            $table->string('updated_at', 255);
            $table->string('updated_by', 255);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('product');
    }
};
