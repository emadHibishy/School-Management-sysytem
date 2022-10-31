<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddStagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('stages')->truncate();

        $stages = [
            [
                'name' => ['ar' => 'المرحلة الإبتدائية', 'en' => 'Primary Stage'],
                'notes'=> ['ar' => '', 'en' => ''],
            ],
            [
                'name' => ['ar' => 'المرحلة الإعدادية', 'en' => 'Preparatory Stage'],
                'notes'=> ['ar' => '', 'en' => ''],
            ],
            [
                'name' => ['ar' => 'المرحلة الثانوية', 'en' => 'Secondary Stage'],
                'notes'=> ['ar' => '', 'en' => ''],
            ],
        ];

        foreach ($stages as $stage)
        {
            Stage::create($stage);
        }
    }
}
