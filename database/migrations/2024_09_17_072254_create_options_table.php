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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->nullable()->constrained()->nullOnDelete();
            $table->text('criteria')->nullable();
            $table->string('employee_count')->nullable();
            ///
            $table->foreignId('work_id')->nullable()->constrained('jobs')->nullOnDelete();
            $table->text('accepted_template')->nullable();
            $table->text('reject_template')->nullable();
            $table->boolean('send_accepted')->nullable();
            $table->boolean('send_rejected')->nullable();
            $table->timestamps();
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('excel_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('excel_id');
        });
    }
};
