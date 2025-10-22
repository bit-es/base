<?php

use Bites\Core\Enums\TaskStatus;
use Bites\Eam\Enums\AssetStatus;
use Bites\Eam\Enums\ContractType;
use Bites\Eam\Enums\WorkType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Asset Types
        Schema::create('asset_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Assets
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_tag')->unique();
            $table->string('name')->nullable();
            $table->string('description');
            $table->foreignId('home_location_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->string('serialnum')->nullable();
            $table->string('modelnum')->nullable();
            $table->foreignId('asset_type_id')->nullable()->constrained('asset_types')->nullOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('assets')->nullOnDelete();
            $table->date('commissioned_at')->nullable();
            $table->date('disposed_at')->nullable();
            // $table->string('status')->default('OPERATING'); // Enum reference
            $table->enum('status', array_column(AssetStatus::cases(), 'value'));
            $table->timestamps();
        });

        // Work Orders
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('wonum')->unique();
            $table->foreignId('asset_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('location_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->string('description');
            // $table->string('status')->default('WAPPR'); // Enum reference
            $table->enum('status', array_column(TaskStatus::cases(), 'value'));
            // $table->string('worktype')->nullable(); // Enum reference
            $table->enum('worktype', array_column(WorkType::cases(), 'value'));
            $table->date('schedstart')->nullable();
            $table->date('actualstart')->nullable();
            $table->date('actualfinish')->nullable();
            $table->timestamps();
        });

        // Job Plans
        Schema::create('job_plans', function (Blueprint $table) {
            $table->id();
            $table->string('jpnum')->unique();
            $table->string('description');
            $table->integer('estimated_duration')->nullable(); // in minutes
            $table->foreignId('instruction_doc_id')->nullable()->constrained('c_docs')->nullOnDelete();
            $table->timestamps();
        });

        // Inventory Items
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('itemnum')->unique();
            $table->string('description');
            $table->integer('quantity')->default(0);
            $table->integer('reorder_point')->default(0);
            $table->string('location')->nullable();
            $table->foreignId('company_id')->nullable()->constrained('c_companies')->nullOnDelete();
            $table->timestamps();
        });

        // Inventory Item - Asset Type Pivot
        Schema::create('asset_type_inventory_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('inventory_item_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // Purchase Orders
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('ponum')->unique();
            $table->foreignId('company_id')->constrained('c_companies')->cascadeOnDelete();
            $table->date('order_date');
            $table->decimal('total_cost', 15, 2)->nullable();
            $table->timestamps();
        });

        // Contracts
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->enum('contract_type', array_column(ContractType::cases(), 'value'));
            $table->string('reference_number')->nullable();
            $table->foreignId('company_id')->nullable()->constrained('c_companies')->nullOnDelete();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('terms')->nullable();
            $table->timestamps();
        });
        Schema::create('contractables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained()->cascadeOnDelete();
            $table->morphs('contractable'); // Adds contractable_id and contractable_type
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contractables');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('purchase_orders');
        Schema::dropIfExists('asset_type_inventory_item');
        Schema::dropIfExists('inventory_items');
        Schema::dropIfExists('job_plans');
        Schema::dropIfExists('work_orders');
        Schema::dropIfExists('assets');
        Schema::dropIfExists('asset_types');
    }
};
