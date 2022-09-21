<?php

namespace Database\Seeders;

use App\Models\Helpers\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddSpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->truncate();
        $specializations = [
            [
                'name' => ['ar' => 'اللغة العربية', 'en' => 'Arabic']
            ],
            [
                'name' => ['ar' => 'الرياضيات', 'en' => 'Mathematics']
            ],
            [
                'name' => ['ar' => 'العلوم', 'en' => 'Science']
            ],
            [
                'name' => ['ar' => 'اللغة الانجليزية', 'en' => 'English']
            ],
            [
                'name' => ['ar' => 'التاريخ', 'en' => 'History']
            ],
            [
                'name' => ['ar' => 'الحاسب الآلى', 'en' => 'Computer']
            ],
        ];

        foreach ($specializations as $specialization){
            Specialization::create($specialization);
        }
    }
}
