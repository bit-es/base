<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages core common_extension_tables
{
    public function up(): void
    {
        Schema::create('ext_attributes', function (Blueprint $table) {
            $table->id();
            $table->morphs('attributable');
            $table->string('key');
            $table->json('value')->nullable();
            $table->timestamps();
            $table->unique(['attributable_id', 'attributable_type', 'key']);
        });
        Schema::create('c_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('c_categories')->cascadeOnDelete();
            $table->string('type')->nullable();
            $table->timestamps();
        });
        Schema::create('categorizables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('c_categories')->cascadeOnDelete();
            $table->morphs('categorizable');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ext_attributes');
        Schema::dropIfExists('categorizables');
        Schema::dropIfExists('c_categories');
    }
};
