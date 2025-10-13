<?php

use Bites\Core\Enums\TaskStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration { // packages QAS qas_main_tables
    public function up(): void
    {
        Schema::create('q_quality_standards', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('q_inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quality_standard_id')->constrained('q_quality_standards')->cascadeOnDelete();
            $table->foreignId('performed_by')->constrained('h_staff')->cascadeOnDelete();
            $table->date('performed_at');
            $table->enum('result', ['pass', 'fail']);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        Schema::create('q_non_conformities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspection_id')->constrained('q_inspections')->cascadeOnDelete();
            $table->text('description');
            $table->enum('status', array_column(TaskStatus::cases(), 'value'))->default('Open');
            $table->timestamps();
        });

        Schema::create('q_corrective_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('non_conformity_id')->constrained('q_non_conformities')->cascadeOnDelete();
            $table->text('action');
            $table->foreignId('responsible_id')->constrained('h_staff')->cascadeOnDelete();
            $table->date('due_date');
            $table->enum('status', array_column(TaskStatus::cases(), 'value'))->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('q_corrective_actions');
        Schema::dropIfExists('q_non_conformities');
        Schema::dropIfExists('q_inspections');
        Schema::dropIfExists('q_quality_standards');
    }
};

























































































