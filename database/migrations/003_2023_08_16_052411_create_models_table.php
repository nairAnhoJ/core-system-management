<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_deleted')->default(0);
            $table->string('key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('models');
    }
};
