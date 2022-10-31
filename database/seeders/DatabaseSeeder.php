<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddUserSeeder::class);
        $this->call(AddStagesSeeder::class);
        $this->call(AddGradesSeeder::class);
        $this->call(AddClassroomsSeeder::class);
        $this->call(BloodTypesSeeder::class);
        $this->call(NationalitiesSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(AddGendersSeeder::class);
        $this->call(AddSpecializationsSeeder::class);
        $this->call(AddSemestersSeeder::class);
        $this->call(AddSchoolYearsSeeder::class);
        $this->call(AddSubjectsSeeder::class);
        $this->call(AddTeachersSeeder::class);
    }
}
