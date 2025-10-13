<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration // packages LMS lms_main_tables
{public function up(): void
{
    Schema::create('l_courses', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->timestamps();
    });

    Schema::create('l_modules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('course_id')->constrained('l_courses')->cascadeOnDelete();
        $table->string('title');
        $table->timestamps();
    });

    Schema::create('l_quizzes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('module_id')->constrained('l_modules')->cascadeOnDelete();
        $table->string('title');
        $table->integer('passing_score');
        $table->timestamps();
    });

    Schema::create('l_questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('quiz_id')->constrained('l_quizzes')->cascadeOnDelete();
        $table->text('text');
        $table->timestamps();
    });

    Schema::create('l_answers', function (Blueprint $table) {
        $table->id();
        $table->foreignId('question_id')->constrained('l_questions')->cascadeOnDelete();
        $table->text('text');
        $table->boolean('is_correct')->default(false);
        $table->timestamps();
    });

    Schema::create('l_quiz_attempts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('staff_id')->constrained('h_staff')->cascadeOnDelete();
        $table->foreignId('quiz_id')->constrained('l_quizzes')->cascadeOnDelete();
        $table->integer('score');
        $table->boolean('passed');
        $table->date('attempted_at');
        $table->timestamps();
    });

    Schema::create('l_certificates', function (Blueprint $table) {
        $table->id();
        $table->foreignId('staff_id')->constrained('h_staff')->cascadeOnDelete();
        $table->foreignId('course_id')->constrained('l_courses')->cascadeOnDelete();
        $table->date('issued_at');
        $table->date('valid_until')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('l_certificates');
        Schema::dropIfExists('l_quiz_attempts');
        Schema::dropIfExists('l_answers');
        Schema::dropIfExists('l_questions');
        Schema::dropIfExists('l_quizzes');
        Schema::dropIfExists('l_modules');
        Schema::dropIfExists('l_courses');

    }
};
