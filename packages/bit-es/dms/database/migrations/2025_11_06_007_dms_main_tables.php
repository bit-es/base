<?php

use Bites\Dms\Enums\DocumentClassification;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages DMS dms_main_tables
{public function up(): void
{
    Schema::create('d_containers', function (Blueprint $table) {
        $table->id();
        $table->foreignId('org_unit_id')->nullable()->constrained('c_org_units')->nullOnDelete();
        $table->enum('level', array_column(DocumentClassification::cases(), 'value'))->default('L4');
        $table->string('name')->nullable();
        $table->timestamps();
    });

    // For L1 & L2: folders (folder path tracked)
    Schema::create('d_folders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('d_container_id')->nullable()->constrained('d_containers')->cascadeOnDelete();
        $table->string('path'); // path or identifier
        $table->timestamps();
    });

    // All files (for L1-L4). L1/L2 ideally reference folder; L3/L4 direct uploads
    Schema::create('d_files', function (Blueprint $table) {
        $table->id();
        $table->foreignId('d_container_id')->nullable()->constrained('d_containers')->cascadeOnDelete();
        $table->foreignId('d_folder_id')->nullable()->constrained('d_folders')->cascadeOnDelete();
        $table->string('filename');
        $table->string('filepath')->nullable();
        $table->timestamp('modified_at')->nullable();
        $table->enum('level', array_column(DocumentClassification::cases(), 'value'))->default('L4');
        $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('d_files');
        Schema::dropIfExists('d_folders');
        Schema::dropIfExists('d_containers');
    }
};
