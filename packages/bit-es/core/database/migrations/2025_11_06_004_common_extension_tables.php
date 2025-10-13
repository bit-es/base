<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration { // packages core common_extension_tables
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
    }
    public function down(): void
    {
        Schema::dropIfExists('ext_attributes');
    }
};

























































































































