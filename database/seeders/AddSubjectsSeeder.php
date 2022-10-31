<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->truncate();

        $subjects = [
            [
                'name' => ['en' => 'Arabic', 'ar'=> 'اللغة العربية']
            ],
            [
                'name' => ['en' => 'English', 'ar'=> 'اللغة الإنجليزية']
            ],
            [
                'name' => ['en' => 'Mathematics', 'ar'=> 'الرياضيات']
            ],
            [
                'name' => ['en' => 'Science', 'ar'=> 'العلوم']
            ],
            [
                'name' => ['en' => 'Social Studies', 'ar'=> 'الدراسات الإجتماعية']
            ],
            [
                'name' => ['en' => 'Computer', 'ar'=> 'الحاسب الآلى']
            ],
            [
                'name' => ['en' => 'religion', 'ar'=> 'التربية الدينية']
            ],
            [
                'name' => ['en' => 'Drawing', 'ar'=> 'الرسم']
            ],
            [
                'name' => ['en' => 'Social Activities', 'ar'=> 'النشاطات الإجتماعية']
            ],
            [
                'name' => ['en' => 'Games', 'ar'=> 'الألعاب']
            ],
            [
                'name' => ['en' => 'Chemistry', 'ar'=> 'الكيمياء']
            ],
            [
                'name' => ['en' => 'Physics', 'ar'=> 'الفيزياء']
            ],
            [
                'name' => ['en' => 'Biology', 'ar'=> 'الأحياء']
            ],
            [
                'name' => ['en' => 'History', 'ar'=> 'التاريخ']
            ],
            [
                'name' => ['en' => 'Geography', 'ar'=> 'الجغرافيا']
            ],
            [
                'name' => ['en' => 'Geology', 'ar'=> 'الجيولوجيا']
            ],
            [
                'name' => ['en' => 'French', 'ar'=> 'الجغرافيا']
            ],
            [
                'name' => ['en' => 'Dynamics', 'ar'=> 'الديناميكا']
            ],
            [
                'name' => ['en' => 'Static', 'ar'=> 'الاستاتيكا']
            ],
            [
                'name' => ['en' => 'algebra', 'ar'=> 'الجبر']
            ],
            [
                'name' => ['en' => 'Differential  Calculus', 'ar'=> 'التفاضل']
            ],
            [
                'name' => ['en' => 'Integral Calculus', 'ar'=> 'التكامل']
            ],
            [
                'name' => ['en' => 'Solid geometry', 'ar'=> 'الهندسة الفراغية']
            ],
        ];

        foreach ($subjects as $subject)
        {
            Subject::create($subject);
        }
    }
}
