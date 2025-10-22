<?php

use Bites\Core\Enums\SettingType;
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
            $table->foreignId('parent_id')->nullable()->constrained('u_classifies')->nullOnDelete();
            $table->morphs('classifiable');
            $table->timestamps();
        });
        Schema::create('u_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->json('value');
            $table->enum('type', array_column(SettingType::cases(), 'value'));
            $table->foreignId('classify_id')->nullable()->constrained('u_classifies')->nullOnDelete();
            $table->timestamps();
        });

Schema::create('form_settings', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->json('schema')->nullable();
    $table->timestamps();
});

        Schema::create('u_properties', function (Blueprint $table) {
            $table->id();
            $table->morphs('propertable');
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->string('key');
            $table->string('value')->nullable();
            $table->timestamps();
        });

        Schema::create('u_metrics', function (Blueprint $table) {
            $table->id();
            $table->morphs('metricable');
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->string('key');
            $table->string('value')->nullable();
            $table->timestamp('recorded_at')->useCurrent();
            $table->timestamps();
        });

        Schema::create('u_tasks', function (Blueprint $table) {
            $table->id();
            $table->morphs('taskable');
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('u_events', function (Blueprint $table) {
            $table->id();
            $table->morphs('eventable');
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('start_at');
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });

        Schema::create('u_snapshots', function (Blueprint $table) {
            $table->id();
            $table->morphs('snapshotable');
            $table->foreignId('setting_id')->nullable()->constrained('u_settings')->nullOnDelete();
            $table->string('title')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('u_classifies');

    }
};
