<?php

use Bites\Core\Enums\SettingType;
use Bites\Core\Enums\TaskStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages core core_extmodels_tables
{
    public function up(): void
    {
        Schema::create('u_classifies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            // $table->morphs('classifiables');
            $table->foreignId('parent_id')->nullable()->constrained('u_classifies')->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('classifiables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classify_id')->constrained('u_classifies')->cascadeOnDelete();
            $table->morphs('classifiable'); // classifiable_type + classifiable_id
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['classify_id', 'classifiable_type', 'classifiable_id'], 'unique_classifiable');
        });
        Schema::create('u_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('applies_to', array_column(SettingType::cases(), 'value'));
            $table->foreignId('classify_id')->constrained('u_classifies')->cascadeOnDelete();
            $table->json('form_schema')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
        Schema::create('u_properties', function (Blueprint $table) {
            $table->id();
            $table->morphs('propertable');
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->string('key');
            $table->string('value')->nullable();
            $table->string('uom')->nullable();
            $table->timestamps();

            $table->index('key');
            $table->index('classify_id');
            $table->index('setting_id');
        });
        Schema::create('u_metrics', function (Blueprint $table) {
            $table->id();
            $table->morphs('metricable');
            // $table->unsignedBigInteger('metricable_id');
            $table->foreignId('classify_id')->constrained('u_classifies')->cascadeOnDelete();
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->json('data')->nullable();
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();

            $table->index('key');
            $table->index('classify_id');
            $table->index('setting_id');
        });
        Schema::create('u_tasks', function (Blueprint $table) {
            $table->id();
            $table->morphs('taskable');
            $table->foreignId('classify_id')->constrained('u_classifies')->cascadeOnDelete();
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->json('data')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->enum('type', array_column(TaskStatus::cases(), 'value'))->default('Open');
            $table->timestamps();

            $table->index('key');
            $table->index('classify_id');
            $table->index('setting_id');
        });
        Schema::create('u_events', function (Blueprint $table) {
            $table->id();
            $table->morphs('eventable');
            $table->foreignId('classify_id')->constrained('u_classifies')->cascadeOnDelete();
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->json('data')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('start_at');
            $table->timestamp('end_at')->nullable();
            $table->timestamps();

            $table->index('key');
            $table->index('classify_id');
            $table->index('setting_id');
        });
        Schema::create('u_snapshots', function (Blueprint $table) {
            $table->id();
            $table->morphs('snapshotable');
            $table->foreignId('classify_id')->constrained('u_classifies')->cascadeOnDelete();
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->json('data')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();

            $table->index('key');
            $table->index('classify_id');
            $table->index('setting_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('u_snapshots');
        Schema::dropIfExists('u_events');
        Schema::dropIfExists('u_tasks');
        Schema::dropIfExists('u_metrics');
        Schema::dropIfExists('u_properties');
        Schema::dropIfExists('u_settings');
        Schema::dropIfExists('classifiables');
        Schema::dropIfExists('u_classifies');
    }
};
