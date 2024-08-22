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
        Schema::table('asks', function (Blueprint $table) {
            $table->boolean('active')->nullable()->default(true);
            $table->integer('sort')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asks', function (Blueprint $table) {
            $table->dropColumn('active','sort');
        });
    }
};
