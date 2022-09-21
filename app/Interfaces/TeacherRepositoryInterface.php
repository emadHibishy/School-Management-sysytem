<?php

namespace App\Interfaces;

use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Models\Teacher;

interface TeacherRepositoryInterface{

    public function getTeachers();

    public function storeTeachers($request);

    public function updateTeacher($teacher, $request);

    public function deleteTeacher($teacher);

    public function getSpecializations();

    public function getGenders();

}
