<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages lifecycle_tables
{

    public function up(): void
    {
        // Org Units
        // Schema::create('org_units', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name')->unique();
        //     $table->foreignId('parent_id')->nullable()->constrained('org_units')->onDelete('cascade');
        //     $table->string('type')->nullable();
        //     $table->timestamps();
        // });

        // Entities
        // Schema::create('entities', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name')->unique(); // e.g., "Employee"
        //     $table->string('model_url')->nullable(); // e.g., "App\Models\Employee"
        //     $table->timestamps();
        // });

        // Lifecycle Types
        Schema::create('lifecycle_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->string('model_entity')->nullable(); // e.g., "App\Models\Employee"
            $table->timestamps();
        });

        // Lifecycle Stages
        Schema::create('lifecycle_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lifecycle_type_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Responsibilities
        Schema::create('responsibilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('org_unit_id')->constrained('c_org_unit')->onDelete('cascade');
            $table->timestamps();
        });

        // Activities
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lifecycle_stage_id')->constrained()->onDelete('cascade');
            $table->foreignId('responsibility_id')->constrained()->onDelete('cascade');
            $table->foreignId('entity_id')->constrained('entities')->onDelete('cascade');
            $table->text('workflow');
            $table->timestamps();
        });

        // Role Mappers
        Schema::create('role_mappers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->nullable()->constrained('staff')->onDelete('cascade');
            $table->foreignId('job_position_id')->nullable()->constrained('c_job_positions')->onDelete('cascade');
            $table->foreignId('job_role_id')->nullable()->constrained('c_org_roles')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('role_mappers');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('responsibilities');
        Schema::dropIfExists('lifecycle_stages');
        Schema::dropIfExists('lifecycle_types');
        Schema::dropIfExists('entities');
        Schema::dropIfExists('org_units');
    }
};
