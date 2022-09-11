<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classroom\StoreClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Stage;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::with(['Classrooms', 'Grades'])->get();
        $grades = Grade::all();
        return view('pages.classrooms.index', compact('stages', 'grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeClassroomRequest $request, FlasherInterface $flasher)
    {
//        $classrooms = $request->classrooms;
        try {
//            foreach ($classrooms as $classroom)
//            {
                Classroom::create([
                    'name' => ['ar' => $request->classroom_name_ar , 'en' => $request->classroom_name_en],
                    'grade_id' => $request->grade_id,
                    'stage_id' => $request->stage_id,
                ]);
                $flasher->addSuccess( __('classrooms.add_success') );
//            }
        }
        catch (\Exception $err)
        {
            $flasher->addError( __($err->getMessage()) );
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(storeClassroomRequest $request, Classroom $classroom, FlasherInterface $flasher)
    {
        try {
            $classroom->update([
                'name' => ['ar' => $request->classroom_name_ar , 'en' => $request->classroom_name_en],
                'grade_id' => $request->grade_id,
                'stage_id' => $request->stage_id,
                'status' => $request->status ? 1 : 0
            ]);
            $flasher->addSuccess(__('classrooms.edit_success'));
        }
        catch (\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, FlasherInterface $flasher)
    {
        try {
            $classroom->delete();
            $flasher->addSuccess(__('classrooms.delete_success'));
        }
        catch (\Exception $err)
        {
            $flasher->addError( $err->getMessage());
        }
        return redirect()->back();
    }



    public function gradesbystage($stage_id)
    {
        $stage_id = (int)$stage_id;
        return Grade::where('stage_id', $stage_id)->pluck('name', 'id');

    }
}
