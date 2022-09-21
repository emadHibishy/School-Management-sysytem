<?php

namespace App\Repository;

use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Models\Helpers\Gender;
use App\Models\Helpers\Specialization;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements \App\Interfaces\TeacherRepositoryInterface
{

    public function getTeachers()
    {
        return Teacher::with('specialization', 'gender')->get();
    }

    public function getSpecializations()
    {
        return Specialization::all();
    }

    public function getGenders()
    {
        return Gender::all();
    }

    public function storeTeachers($request)
    {
        return Teacher::create([
            'name' => ['ar' => $request->ar_teacher_name , 'en' => $request->en_teacher_name],
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'specialization_id' => $request->specialization,
            'gender_id' => $request->gender,
            'start_date' => Carbon::parse($request->start_date),
            'birth_date' => Carbon::parse($request->birth_date),
            'address' => $request->address
        ]);
    }

    public function updateTeacher($teacher, $request): bool
    {
        return $teacher->update([
            'name' => ['ar' => $request->ar_teacher_name , 'en' => $request->en_teacher_name],
            'email' => $request->email,
            'password' => is_null($request->new_password) ? Hash::make($request->password) : Hash::make($request->new_password),
            'specialization_id' => $request->specialization,
            'gender_id' => $request->gender,
            'start_date' => Carbon::parse($request->start_date),
            'birth_date' => Carbon::parse($request->birth_date),
            'address' => $request->address
        ]);
    }

    public function deleteTeacher($teacher)
    {
        $teacher->delete();
    }
}
