<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Teacher;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct(TeacherRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = $this->teacher->getTeachers();
        return view('pages.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = $this->teacher->getSpecializations();
        $genders = $this->teacher->getGenders();
        return view('pages.teachers.create', compact('specializations', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request, FlasherInterface $flasher)
    {
        try {
            $this->teacher->storeTeachers($request);
            $flasher->addSuccess(__('teachers.add_success'));
        }
        catch (\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $specializations = $this->teacher->getSpecializations();
        $genders = $this->teacher->getGenders();
        return view('pages.teachers.edit', compact('teacher', 'specializations', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeacherRequest $request, Teacher $teacher, FlasherInterface $flasher)
    {
        try {
            $this->teacher->updateTeacher($teacher, $request);
            $flasher->addSuccess(__('teachers.edit_success'));
        }
        catch (\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher, FlasherInterface $flasher)
    {
        try {
            $this->teacher->deleteTeacher($teacher);
            $flasher->addSuccess(__('teachers.delete_success'));
        }
        catch (\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
        return redirect()->back();
    }
}
