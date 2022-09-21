<?php

namespace Database\Seeders;

use App\Models\Helpers\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddGendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->truncate();
        $genders = [
            [
                'name' => ['ar' => 'ذكر', 'en' => 'male']
            ],
            [
                'name' => ['ar' => 'أنثى', 'en' => 'female']
            ],
        ];

        foreach ($genders as $gender){
            Gender::create($gender);
        }
    }
}
