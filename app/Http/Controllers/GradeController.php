<?php

namespace App\Http\Controllers;

use App\Http\Requests\Grade\StoreGradeRequest;
use App\Http\Requests\Grade\UpdateGradeRequest;
use App\Models\Grade;
use App\Models\Stage;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        $grades = Grade::all();
        return view('pages.grades.index', compact(['grades', 'stages']));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGradeRequest $request, FlasherInterface $flasher)
    {
        $grades = $request->grades;
        try{
            foreach ($grades as $grade){
                Grade::create([
                    'name' => [ 'ar' => $grade['grade_name_ar'], 'en' => $grade['grade_name_en'] ],
                    'stage_id' => $grade['stage_id']
                ]);
                $flasher->addSuccess( __('grades.add_success') );
            }
        }
        catch(\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request, Grade $grade, FlasherInterface $flasher)
    {
        try {
            $grade->update([
                'name' => ["ar" => $request->grade_name_ar, 'en' => $request->grade_name_en],
                'stage_id' =>  $request->stage_id
            ]);
            $flasher->addSuccess(__('grades.edit_success'));
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
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade, FlasherInterface $flasher)
    {
        try {
            $grade->delete();
            $flasher->addSuccess('grades.delete_success');
        }
        catch (\Exception $err)
        {
            $flasher -> addError($err ->getMessage());
        }
        return redirect()->back();
    }


    public function delete_all(Request $request, FlasherInterface $flasher)
    {
        $ids = explode(',', $request->ids);
        try {
            Grade::whereIn('id', $ids)->delete();
            $flasher->addSuccess('grades.delete_success');
        }
        catch (\Exception $err)
        {
            $flasher -> addError($err ->getMessage());
        }
        return redirect()->back();
    }


    public function stage(Request $request)
    {
        $stages = Stage::all();
        $grades = Grade::where('stage_id', $request->stage_id)->get();
        return view('pages.grades.index', compact(['grades', 'stages']));
    }
}
