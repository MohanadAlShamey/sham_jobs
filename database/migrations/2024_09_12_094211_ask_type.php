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
        Schema::table('asks', function (Blueprint $table) {
            $table->string('job_type')->nullable()->default('both');
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('type')->nullable()->default('manager');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asks', function (Blueprint $table) {
            $table->dropColumn('job_type');
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
