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
        Schema::create('jobs_applied', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('applicant_id');
            $table->string('current_status')->default('Pending');
            $table->string('attached_file');
            $table->timestamps();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('applicant_id')->references('id')->on('applicant_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_applied');
    }
};
