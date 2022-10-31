<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Models\Subject;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('pages.subjects.index', compact('subjects'));
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
    public function store(StoreSubjectRequest $request, FlasherInterface $flasher)
    {
        try {
            Subject::create([
                'name' => ['ar' => $request->ar_name, 'en' => $request->en_name]
            ]);
            $flasher->addSuccess(__('subjects.add_success'));
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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubjectRequest $request, Subject $subject, FlasherInterface $flasher)
    {
        try {
            $subject->update([
                'name' => ['ar' => $request->ar_name, 'en' => $request->en_name]
            ]);
            $flasher->addSuccess(__('subjects.edit_success'));
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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject, FlasherInterface $flasher)
    {
        try {
            $subject->delete();
            $flasher->addSuccess( __('subjects.delete_success') );
        }
        catch (\Exception $err)
        {
            $flasher->addError($err->getMessage());
        }
        return redirect()->back();
    }
}
