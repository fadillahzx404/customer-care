<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('support', function (Blueprint $table) {
            $table->string('id_support')->primary();
            $table
                ->foreignId('users_id')
                ->references('id')
                ->on('users');
            $table->string('id_support');
            $table
                ->foreignId('id_cat_services')
                ->references('id')
                ->on('category_services');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support');
    }
};
