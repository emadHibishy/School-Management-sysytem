<?php

namespace Database\Seeders;

use App\Models\Helpers\BloodType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_types')->truncate();
        $types = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        foreach ($types as $type)
        {
            BloodType::create(['name' => $type]);
        }
    }
}
