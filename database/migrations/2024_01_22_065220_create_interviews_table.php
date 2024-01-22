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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->string('interview_status')->default('Invited');
            $table->boolean('hr_round')->default(0);
            $table->string('hr_remark')->nullable();
            $table->boolean('tech_round')->default(0);
            $table->string('tech_remark')->nullable();
            $table->boolean('hired')->default(0);
            $table->string('scheduled_at');
            $table->timestamps();
            $table->foreign('applicant_id')->references('id')->on('jobs_applieds');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
