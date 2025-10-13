<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Schema::create('turtles', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->text('description')->nullable();
        //     $table->json('metadata')->nullable();
        //     $table->timestamps();
        // });
        // Schema::create('processes', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('turtle_id')->constrained()->cascadeOnDelete();
        //     $table->string('name');
        //     $table->text('description')->nullable(); 
        //     $table->json('metadata')->nullable();
        //     $table->timestamps();
        // });
        // Schema::create('workflows', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('process_id')->constrained()->cascadeOnDelete();
        //     $table->string('name');
        //     $table->text('description')->nullable();
        //     $table->json('metadata')->nullable();
        //     $table->morphs('workflowable');
        //     $table->timestamps();
        // });
        // Schema::create('activities', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('workflow_id')->constrained()->cascadeOnDelete();
        //     $table->string('name');
        //     $table->text('description')->nullable();
        //     $table->json('metadata')->nullable();
        //     $table->morphs('activityable');
        //     $table->timestamps();
        // });
    }

    public function down(): void
    {
        // Schema::dropIfExists('activities');
        // Schema::dropIfExists('workflows');
        // Schema::dropIfExists('processes');
        // Schema::dropIfExists('turtles');
    }
};
