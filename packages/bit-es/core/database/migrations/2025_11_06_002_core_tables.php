<?php

use Bites\Core\Enums\OrgUnitType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages core core_tables
{
    public function up(): void
    {
        // Companies (optional high-level)
        Schema::create('c_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->boolean('isCustomer')->default(false);
            $table->boolean('isSupplier')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // ORG UNITS (company/division/department/team tree)
        Schema::create('c_org_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->enum('type', array_column(OrgUnitType::cases(), 'value'))->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('c_org_units')->nullOnDelete();
            $table->foreignId('company_id')->nullable()->constrained('c_companies')->onDelete('cascade'); // Foreign key to company
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Job Positions (attached to an org unit)
        Schema::create('c_job_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('org_unit_id')->constrained('c_org_units')->cascadeOnDelete();
            $table->string('title');
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('superior_id')->nullable()->constrained('c_job_positions')->nullOnDelete();
            $table->timestamps();
        });
        Schema::create('c_org_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('org_unit_id')->nullable()->constrained('c_org_units')->nullOnDelete();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('staff_number')->unique();
            $table->date('hire_date')->nullable();
            $table->foreignId('cost_center_id')->nullable()->constrained('p_cost_centers')->nullOnDelete();
            $table->foreignId('org_unit_id')->nullable()->constrained('c_org_units')->nullOnDelete();
            // $table->foreignId('job_position_id')->nullable()->constrained('c_job_positions')->nullOnDelete();
            $table->timestamps();
        });
        // for consumption of users, staffs (actual), job_posts (defined)
        Schema::create('person_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('key'); // e.g. 'gender', 'dob', 'phone'
            $table->text('value')->nullable();
            $table->morphs('attributable'); // adds attributable_id and attributable_type
            $table->timestamps();
        });
        // for consumption of assets, equipment, (actual,defined)
        Schema::create('asset_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('key'); // e.g. 'dimensions', 'type', 'location'
            $table->text('value')->nullable();
            $table->morphs('attributable'); // adds adds attributable_id and attributable_type
            $table->timestamps();
        });

        Schema::create('role_mappers', function (Blueprint $table) {
            $table->id();
            $table->morphs('mappable'); // creates mappable_id and mappable_type
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $table->timestamps();
        });

        //  // Assign role to a JobPost
        // $jobPost->roleMappers()->create(['role_id' => $adminRole->id]);

        // // Assign role to a Staff
        // $staff->roleMappers()->create(['role_id' => $editorRole->id]);

        // // Sync roles to user on login
        // $roleIds = RoleMapper::whereHasMorph('mappable', [Staff::class, JobPost::class], function ($query) use ($staff, $jobPost) {
        //     $query->whereIn('id', [$staff->id, optional($jobPost)->id]);
        // })->pluck('role_id');

        // $user->syncRoles(Role::whereIn('id', $roleIds)->get());

        Schema::create('c_panels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('path')->unique();
            $table->string('primary_color')->nullable();
            $table->string('gray_color')->nullable();
            $table->string('success_color')->nullable();
            $table->string('info_color')->nullable();
            $table->string('warning_color')->nullable();
            $table->string('danger_color')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('panel_title')->nullable();
            $table->json('resource_classes')->nullable();
            $table->json('widget_classes')->nullable();
            $table->json('page_classes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('c_panels');
        Schema::dropIfExists('c_org_roles');
        Schema::dropIfExists('c_job_positions');
        Schema::dropIfExists('c_org_units');
        Schema::dropIfExists('c_companies');
    }
};
