<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddSchoolYearsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_years')->truncate();

        $school_years = [
            [
                'name' => '2021-2022',
                'start_date' => '2021-09-15',
                'end_date' => '2022-08-01',
                'status' => 0
            ],
            [
                'name' => '2022-2023',
                'start_date' => '2022-09-15',
                'end_date' => '2023-08-01',
                'status' => 1
            ],
        ];

        foreach ($school_years as $school_year)
        {
            SchoolYear::create($school_year);
        }
    }
}
