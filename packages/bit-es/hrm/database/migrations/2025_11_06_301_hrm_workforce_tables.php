<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages HRM hrm_main_tables
{
    public function up(): void
    {

        Schema::create('workforce_templates', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Job title
            $table->longText('description'); // Detailed description
            $table->json('attributes')->nullable();
            // attributes will store tasks, basic_skills, specific_skills, knowledge, interest
            // Example: { "tasks": "...", "basic_skills": "...", "specific_skills": "...", "knowledge": "...", "interest": "..." }
            $table->string('masco_code')->nullable(); // MASCO code
            $table->timestamps();
        });

        Schema::create('workforce_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('org_unit_id')->nullable()->constrained('c_org_units')->nullOnDelete();
            $table->foreignId('job_title_id')->nullable()->constrained('workforce_templates')->nullOnDelete();
            $table->string('title'); // Job title
            $table->integer('required_quantity')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workforce_plans');
        Schema::dropIfExists('workforce_templates');
    }
};
