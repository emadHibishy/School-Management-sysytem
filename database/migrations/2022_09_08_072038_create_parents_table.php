<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Fatherinformation
            $table->string('father_name');
            $table->string('father_national_id');
            $table->string('father_passport_id');
            $table->string('father_phone');
            $table->string('father_job');
            $table->foreignId('father_nationality_id')
                ->references('id')
                ->on('nationalities')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('father_blood_type_id')
                ->references('id')
                ->on('blood_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('father_religion_id')
                ->references('id')
                ->on('religions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('father_address');

            //Mother information
            $table->string('mother_name');
            $table->string('mother_national_id');
            $table->string('mother_passport_id');
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->foreignId('mother_nationality_id')
                ->references('id')
                ->on('nationalities')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('mother_blood_type_id')
                ->references('id')
                ->on('blood_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('mother_religion_id')
                ->references('id')
                ->on('religions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('mother_address');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
