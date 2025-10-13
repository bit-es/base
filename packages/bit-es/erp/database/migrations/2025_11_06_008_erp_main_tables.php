<?php

use Bites\Erp\Enums\CostElementType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages ERP erp_main_tables
{public function up(): void
{
    Schema::create('p_cost_centers', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique();
        $table->string('name');
        $table->foreignId('org_unit_id')->nullable()->constrained('c_org_units')->nullOnDelete();
        $table->foreignId('owner_id')->nullable()->constrained('users')->nullOnDelete(); // approver
        $table->timestamps();
    });

    Schema::create('p_cost_elements', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique();
        $table->string('name');
        $table->enum('type', array_column(CostElementType::cases(), 'value'))->nullable();
        $table->timestamps();
    });

    Schema::create('p_budgets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cost_center_id')->constrained()->cascadeOnDelete();
        $table->decimal('amount', 15, 2);
        $table->year('year');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('p_budgets');
        Schema::dropIfExists('p_cost_elements');
        Schema::dropIfExists('p_cost_centers');
    }
};
