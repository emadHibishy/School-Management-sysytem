<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddGradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->truncate();

        $grades = [
            [
                'name' => ['ar' => 'الصف الأول الإبتدائى' , 'en' => '1st Primary Grade'],
                'stage_id' => 1,
            ],
            [
                'name' => ['ar' => 'الصف الثانى الإبتدائى' , 'en' => '2nd Primary Grade'],
                'stage_id' => 1,
            ],
            [
                'name' => ['ar' => 'الصف الثالث الإبتدائى' , 'en' => '3rd Primary Grade'],
                'stage_id' => 1,
            ],
            [
                'name' => ['ar' => 'الصف الرابع الإبتدائى' , 'en' => '4th Primary Grade'],
                'stage_id' => 1,
            ],
            [
                'name' => ['ar' => 'الصف الخامس الإبتدائى' , 'en' => '5th Primary Grade'],
                'stage_id' => 1,
            ],
            [
                'name' => ['ar' => 'الصف السادس الإبتدائى' , 'en' => '6th Primary Grade'],
                'stage_id' => 1,
            ],
            [
                'name' => ['ar' => 'الصف الأول الإعدادى' , 'en' => '1st Preparatory Grade'],
                'stage_id' => 2,
            ],
            [
                'name' => ['ar' => 'الصف الثانى الإعدادى' , 'en' => '2nd Preparatory Grade'],
                'stage_id' => 2,
            ],
            [
                'name' => ['ar' => 'الصف الثالث الإعدادى' , 'en' => '3rd Preparatory Grade'],
                'stage_id' => 2,
            ],
            [
                'name' => ['ar' => 'الصف الأول الثانوى' , 'en' => '1st Secondary Grade'],
                'stage_id' => 3,
            ],
            [
                'name' => ['ar' => 'الصف الثانى الثانوى' , 'en' => '2nd Secondary Grade'],
                'stage_id' => 3,
            ],
            [
                'name' => ['ar' => 'الصف الثالث الثانوى' , 'en' => '3rd Secondary Grade'],
                'stage_id' => 3,
            ],
        ];

        foreach ($grades as $grade)
        {
            Grade::create($grade);
        }
    }
}
