<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Schema::create('c_pcfs', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('category');
        //     $table->string('subcategory');
        // });
        Schema::create('c_docs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->enum('type', ['SOP', 'WI', 'FORM']);
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });

        Schema::create('c_turtles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('org_unit_id')->constrained('c_org_units')->onDelete('cascade');
            $table->string('code');
            $table->string('name');
            $table->string('input')->nullable();
            $table->string('output')->nullable();
            $table->foreignId('supplier_id')->nullable()->constrained('c_org_roles')->nullOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained('c_org_roles')->nullOnDelete();
            $table->foreignId('org_role_id')->nullable()->constrained('c_org_roles')->nullOnDelete();
            $table->string('resources')->nullable();
            $table->string('methods')->nullable();
            $table->string('kpis')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('sop_id')->nullable()->constrained('c_docs')->nullOnDelete();
            $table->foreignId('wi_id')->nullable()->constrained('c_docs')->nullOnDelete();
            $table->foreignId('form_id')->nullable()->constrained('c_docs')->nullOnDelete();
            $table->timestamps();
        });

        // Schema::create('processes', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('turtle_id')->constrained('c_turtles')->cascadeOnDelete();
        //     $table->string('name');
        //     $table->text('description')->nullable();
        //     $table->json('metadata')->nullable();
        //     $table->timestamps();
        // });

        Schema::create('c_workflows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turtle_id')->constrained('c_turtles')->cascadeOnDelete();
            $table->string('name');
            // $table->string('category')->nullable();
            //$table->string('sub_category')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('workflow_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workflow_id')->constrained('c_workflows')->cascadeOnDelete();
            $table->string('name');
            $table->boolean('is_initial')->default(false);
            $table->boolean('is_final')->default(false);
            $table->foreignId('assignee_role_id')->nullable()->constrained('c_org_roles')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('workflow_transitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workflow_id')->constrained('c_workflows')->cascadeOnDelete();
            $table->foreignId('from_state_id')->constrained('workflow_states')->cascadeOnDelete();
            $table->foreignId('to_state_id')->constrained('workflow_states')->cascadeOnDelete();
            $table->string('action_name');
            $table->timestamps();
        });

        Schema::create('c_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workflow_id')->constrained('c_workflows')->cascadeOnDelete();
            $table->foreignId('current_state_id')->nullable()->constrained('workflow_states')->nullOnDelete();
            $table->morphs('subject');
            $table->foreignId('initiator_id')->nullable()->constrained('c_org_roles')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('c_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workflow_id')->constrained('c_workflows')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->morphs('activityable');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('c_activities');
        Schema::dropIfExists('c_requests');
        Schema::dropIfExists('workflow_transitions');
        Schema::dropIfExists('workflow_states');
        Schema::dropIfExists('c_workflows');
        // Schema::dropIfExists('processes');
        Schema::dropIfExists('c_turtles');
        Schema::dropIfExists('c_docs');
        // Schema::dropIfExists('c_pcfs');
    }
};
