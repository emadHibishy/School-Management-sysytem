<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddClassroomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->truncate();

        $classrooms = [
            [
                'name' => '1-A',
                'grade_id'=> '1',
                'stage_id' => 1
            ],
            [
                'name' => '1-B',
                'grade_id'=> '1',
                'stage_id' => 1
            ],
            [
                'name' => '2-A',
                'grade_id'=> '2',
                'stage_id' => 1
            ],
            [
                'name' => '2-B',
                'grade_id'=> '2',
                'stage_id' => 1
            ],
            [
                'name' => '3-A',
                'grade_id'=> '3',
                'stage_id' => 1
            ],
            [
                'name' => '3-B',
                'grade_id'=> '3',
                'stage_id' => 1
            ],
            [
                'name' => '4-A',
                'grade_id'=> '4',
                'stage_id' => 1
            ],
            [
                'name' => '4-B',
                'grade_id'=> '4',
                'stage_id' => 1
            ],
            [
                'name' => '5-A',
                'grade_id'=> '5',
                'stage_id' => 1
            ],
            [
                'name' => '5-B',
                'grade_id'=> '5',
                'stage_id' => 1
            ],
            [
                'name' => '6-A',
                'grade_id'=> '6',
                'stage_id' => 1
            ],
            [
                'name' => '6-B',
                'grade_id'=> '6',
                'stage_id' => 1
            ],
            [
                'name' => '1-A',
                'grade_id'=> '7',
                'stage_id' => 2
            ],
            [
                'name' => '1-B',
                'grade_id'=> '7',
                'stage_id' => 2
            ],
            [
                'name' => '1-C',
                'grade_id'=> '7',
                'stage_id' => 2
            ],
            [
                'name' => '2-A',
                'grade_id'=> '8',
                'stage_id' => 2
            ],
            [
                'name' => '2-B',
                'grade_id'=> '8',
                'stage_id' => 2
            ],
            [
                'name' => '2-C',
                'grade_id'=> '8',
                'stage_id' => 2
            ],
            [
                'name' => '3-A',
                'grade_id'=> '9',
                'stage_id' => 2
            ],
            [
                'name' => '3-B',
                'grade_id'=> '9',
                'stage_id' => 2
            ],
            [
                'name' => '3-C',
                'grade_id'=> '9',
                'stage_id' => 2
            ],
            [
                'name' => '1-A',
                'grade_id'=> '10',
                'stage_id' => 3
            ],
            [
                'name' => '1-B',
                'grade_id'=> '10',
                'stage_id' => 3
            ],
            [
                'name' => '1-C',
                'grade_id'=> '10',
                'stage_id' => 3
            ],
            [
                'name' => '2-A',
                'grade_id'=> '11',
                'stage_id' => 3
            ],
            [
                'name' => '2-B',
                'grade_id'=> '11',
                'stage_id' => 3
            ],
            [
                'name' => '2-C',
                'grade_id'=> '11',
                'stage_id' => 3
            ],
            [
                'name' => '3-A',
                'grade_id'=> '12',
                'stage_id' => 3
            ],
            [
                'name' => '3-B',
                'grade_id'=> '12',
                'stage_id' => 3
            ],
            [
                'name' => '3-C',
                'grade_id'=> '12',
                'stage_id' => 3
            ],
        ];

        foreach ($classrooms as $classroom)
        {
            Classroom::create($classroom);
        }
    }
}
