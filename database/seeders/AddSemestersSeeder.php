<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddSemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->truncate();

        $semesters = [
            [
                'name' => ['ar' => 'الفصل الدراسى الأول', 'en' => 'Semester 1']
            ],
            [
                'name' => ['ar' => 'الفصل الدراسى الثانى', 'en' => 'Semester 2']
            ],
        ];

        foreach ($semesters as $semester)
        {
            Semester::create($semester);
        }
    }
}
