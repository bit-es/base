<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration { // packages EAM eam_main_tables
    public function up(): void
    {
        Schema::create('a_assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_tag')->unique();
            $table->string('name');
            //  $table->string('category')->nullable();
            $table->foreignId('cost_center_id')->nullable()->constrained('p_cost_centers')->nullOnDelete();
            $table->date('acquired_at')->nullable();
            $table->decimal('value', 15, 2)->nullable();
            $table->timestamps();
        });
        Schema::create('a_spare_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->decimal('quantity', 10, 2)->nullable();
            $table->timestamps();
        });
        Schema::create('a_maintenance_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('a_assets')->cascadeOnDelete();
            $table->string('name');
            $table->enum('frequency', ['daily', 'weekly', 'monthly', 'quarterly', 'yearly']);
            $table->timestamps();
        });
        Schema::create('a_maintenance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('a_assets')->cascadeOnDelete();
            $table->foreignId('performed_by')->constrained('h_staff')->cascadeOnDelete();
            $table->date('performed_at');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('a_maintenance_records');
        Schema::dropIfExists('a_maintenance_plans');
        Schema::dropIfExists('a_spare_parts');
        Schema::dropIfExists('a_assets');
    }
};





























































































