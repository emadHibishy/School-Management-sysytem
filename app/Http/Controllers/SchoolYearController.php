<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolYears\StoreSchoolYearsRequest;
use App\Models\SchoolYear;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_years = SchoolYear::all();
        return view('pages.school_years.index', compact('school_years'));
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
    public function store(StoreSchoolYearsRequest $request, FlasherInterface $flasher)
    {
        try {
            SchoolYear::create([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => 0
            ]);
            $flasher->addSuccess(__('school_years.add_success'));
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
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSchoolYearsRequest $request, SchoolYear $schoolYear, FlasherInterface $flasher)
    {
        try {
            if($schoolYear != 1 && $request->status = 1){
                $activeSchoolYears = SchoolYear::where('status', '1')->get();
                foreach ($activeSchoolYears as $activeSchoolYear){
                    $activeSchoolYear->update(['status' => 0]);
                }
            }
            $schoolYear->update([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status ? 1 : 0
            ]);
            $flasher->addSuccess(__('school_years.edit_success'));
        }
        catch(\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolYear $schoolYear, FlasherInterface $flasher)
    {
        try {
            $schoolYear->delete();
            $flasher->addSuccess(__('school_years.delete_success'));
        }
        catch(\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
        return redirect()->back();
    }
}
