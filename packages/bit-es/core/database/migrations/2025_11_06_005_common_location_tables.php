<?php

use Bites\Core\Enums\LocationType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages core common_location_tables
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->enum('type', array_column(LocationType::cases(), 'value'));
            $table->foreignId('parent_id')->nullable()->constrained('locations')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('movements', function (Blueprint $table) {
            $table->morphs('movable'); // adds movable_type and movable_id
            $table->foreignId('from_location_id')->nullable()->constrained('locations')->onDelete('set null');
            $table->foreignId('to_location_id')->nullable()->constrained('locations')->onDelete('set null');
            $table->timestamp('moved_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movements');
        Schema::dropIfExists('locations');
    }
};
