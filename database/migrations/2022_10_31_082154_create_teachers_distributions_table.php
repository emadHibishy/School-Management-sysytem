<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_distributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')
                ->references('id')
                ->on('teachers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('subject_id')
                ->references('id')
                ->on('subjects')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('grade_id')
                ->references('id')
                ->on('grades')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('classroom_id')
                ->references('id')
                ->on('classrooms')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('semester_id')
                ->references('id')
                ->on('semesters')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('school_year_id')
                ->references('id')
                ->on('school_years')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers_distributions');
    }
}
