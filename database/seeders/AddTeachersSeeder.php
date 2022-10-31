<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddTeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->truncate();

        $teachers = [
            [
                'name' => ['en' => 'Elsaed Elshater', 'ar' => 'السعيد الشاطر'],
                'email' => 'saed.shater@school.com',
                'password' => \Hash::make('123456789'),
                'specialization_id' => 2,
                'gender_id' => 1,
                'address' => '',
                'start_date' => '2022-09-15',
                'birth_date' => '1980-09-12'
            ],
            [
                'name' => ['en' => 'Seham Sokkar', 'ar' => 'سهام سكر'],
                'email' => 'seham.sokkar@school.com',
                'password' => \Hash::make('123456789'),
                'specialization_id' => 1,
                'gender_id' => 2,
                'address' => '',
                'start_date' => '2022-09-15',
                'birth_date' => '1980-09-12'
            ],
            [
                'name' => ['en' => 'Khaled Safi', 'ar' => 'خالد صافى'],
                'email' => 'khaled.safi@school.com',
                'password' => \Hash::make('123456789'),
                'specialization_id' => 3,
                'gender_id' => 1,
                'address' => '',
                'start_date' => '2022-09-15',
                'birth_date' => '1980-09-12'
            ],
            [
                'name' => ['en' => 'Fathi Abdullah', 'ar' => 'فتحى عبدالله'],
                'email' => 'fathi.abdullah@school.com',
                'password' => \Hash::make('123456789'),
                'specialization_id' => 4,
                'gender_id' => 1,
                'address' => '',
                'start_date' => '2022-09-15',
                'birth_date' => '1980-10-09'
            ],
            [
                'name' => ['en' => 'Sanaa Ali', 'ar' => 'سناء على'],
                'email' => 'sanaa.ali@school.com',
                'password' => \Hash::make('123456789'),
                'specialization_id' => 5,
                'gender_id' => 2,
                'address' => '',
                'start_date' => '2022-09-15',
                'birth_date' => '1980-09-12'
            ],
            [
                'name' => ['en' => 'Sara Sherif', 'ar' => 'سارة شريف'],
                'email' => 'sara.sherif@school.com',
                'password' => \Hash::make('123456789'),
                'specialization_id' => 6,
                'gender_id' => 2,
                'address' => '',
                'start_date' => '2022-09-15',
                'birth_date' => '1980-09-12'
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
