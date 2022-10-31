<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeachersDistribution;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class TeachersDistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $distributions = TeachersDistribution::with([
            'Teacher',
            'Subject',
            'Grade',
            'Classroom',
            'Semester',
            'SchoolYear'
        ])->get();
        return view('pages.distribution.index', compact('distributions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::select('id', 'name')->get();
        $subjects = Subject::select('id', 'name')->get();
        $grades = Grade::select('id', 'name')->get();
        $classrooms = Classroom::select('id', 'name')->get();
        $semesters = Semester::all();
        $years = SchoolYear::where('status', 1)->get();

        return view('pages.distribution.create', compact('teachers', 'subjects', 'classrooms', 'grades', 'semesters', 'years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request , FlasherInterface $flasher)
    {
        try{
            TeachersDistribution::create( $request->all());
            $flasher->addSuccess(__('distribution.add_success'));
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
     * @param  \App\Models\TeachersDistribution  $teachersDistribution
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(TeachersDistribution $teachersDistribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeachersDistribution  $teachersDistribution
     * @return \Illuminate\Http\Response
     */
    public function edit( $teachersDistribution)
    {
        $teachersDistribution = TeachersDistribution::findorfail($teachersDistribution);
        $teachers = Teacher::select('id', 'name')->get();
        $subjects = Subject::select('id', 'name')->get();
        $grades = Grade::select('id', 'name')->get();
        $classrooms = Classroom::select('id', 'name')->get();
        $semesters = Semester::all();
        $years = SchoolYear::where('status', 1)->get();
        return view('pages.distribution.edit', compact('teachersDistribution', 'teachers', 'subjects', 'classrooms', 'grades', 'semesters', 'years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeachersDistribution  $teachersDistribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teachersDistribution, FlasherInterface $flasher)
    {
        try{
            $teachersDistribution = TeachersDistribution::findorfail($teachersDistribution);
            $teachersDistribution->update($request->all());
            $flasher->addSuccess(__('distribution.edit_success'));
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
     * @param  \App\Models\TeachersDistribution  $teachersDistribution
     * @return \Illuminate\Http\Response
     */
    public function destroy($teachersDistribution, FlasherInterface $flasher)
    {
        try {
            TeachersDistribution::destroy($teachersDistribution);
            $flasher->addSuccess(__('distribution.delete_success'));
        }
        catch(\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
        return redirect()->back();
    }
}
