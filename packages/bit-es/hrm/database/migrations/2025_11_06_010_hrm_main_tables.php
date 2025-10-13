<?php

use Bites\Core\Enums\RequestStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration { // packages HRM hrm_main_tables
    public function up(): void
    {
        Schema::create('h_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('staff_number')->unique();
            $table->date('hire_date')->nullable();
            $table->foreignId('cost_center_id')->nullable()->constrained('p_cost_centers')->nullOnDelete();
            $table->foreignId('org_unit_id')->nullable()->constrained('c_org_units')->nullOnDelete();
            // $table->foreignId('job_position_id')->nullable()->constrained('c_job_positions')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('h_staff_job_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('h_staff')->cascadeOnDelete();
            $table->foreignId('job_position_id')->constrained('c_job_positions')->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('h_staff_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('h_staff')->cascadeOnDelete();
            $table->string('key');
            $table->string('value')->nullable();
            $table->timestamps();
        });

        Schema::create('h_leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('h_staff')->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('reason')->nullable();
            $table->enum('status', array_column(RequestStatus::cases(), 'value'))->nullable();
            $table->timestamps();
        });

        Schema::create('h_qualification_test_specifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('passing_score');
            $table->timestamps();
        });

        Schema::create('h_qualification_test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('h_staff')->cascadeOnDelete();
            $table->foreignId('specification_id')->constrained('h_qualification_test_specifications')->cascadeOnDelete();
            $table->integer('score');
            $table->date('taken_at');
            $table->boolean('passed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('h_qualification_test_results');
        Schema::dropIfExists('h_qualification_test_specifications');
        Schema::dropIfExists('h_leave_requests');
        Schema::dropIfExists('h_staff_attributes');
        Schema::dropIfExists('h_staff_job_assignments');
        Schema::dropIfExists('h_staff');
    }
};
