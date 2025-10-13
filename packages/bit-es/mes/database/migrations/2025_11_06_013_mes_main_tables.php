<?php

use Bites\Core\Enums\TaskStatus;
use Bites\Erp\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration { // packages MES mes_main_tables
    public function up(): void
    {
        Schema::create('x_production_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('quantity');
            $table->date('scheduled_start');
            $table->date('scheduled_end');
            $table->enum('status', array_column(OrderStatus::cases(), 'value'))->default('Planned');
            $table->timestamps();
        });

        Schema::create('x_work_centers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('x_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_order_id')->constrained('x_production_orders')->cascadeOnDelete();
            $table->foreignId('work_center_id')->constrained('x_work_centers')->cascadeOnDelete();
            $table->string('name');
            $table->integer('sequence');
            $table->enum('status', array_column(TaskStatus::cases(), 'value'))->default('Pending');
            $table->timestamps();
        });

        Schema::create('x_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operation_id')->constrained('x_operations')->cascadeOnDelete();
            $table->string('material_code');
            $table->string('description')->nullable();
            $table->decimal('quantity', 15, 3);
            $table->timestamps();
        });

        Schema::create('x_production_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operation_id')->constrained('x_operations')->cascadeOnDelete();
            $table->foreignId('staff_id')->constrained('h_staff')->cascadeOnDelete();
            $table->dateTime('logged_at');
            $table->string('activity');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('x_production_logs');
        Schema::dropIfExists('x_materials');
        Schema::dropIfExists('x_operations');
        Schema::dropIfExists('x_work_centers');
        Schema::dropIfExists('x_production_orders');
    }
};













































































