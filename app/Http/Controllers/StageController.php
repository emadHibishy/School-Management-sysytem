<?php

namespace App\Http\Controllers;

use App\Http\Requests\Stage\storeStageRequest;
use App\Models\Stage;
use Flasher\Prime\FlasherInterface;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        return view('pages.stages.index', compact('stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  storeStageRequest  $request
     * @param  FlasherInterface   $flasher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(storeStageRequest $request, FlasherInterface $flasher)
    {
        try{
            Stage::create([
                'name' => ['ar'=> $request->stage_name_ar , 'en' => $request->stage_name_en],
                'notes' => ['ar'=> $request->notes_ar , 'en' => $request->notes_en]
            ]);
            $flasher->addSuccess(__('stages.add_success'));
        }
        catch( \Exception $err)
        {
            $flasher -> addError($err ->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  storeStageRequest  $request
     * @param  Stage  $stage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(storeStageRequest $request, Stage $stage, FlasherInterface $flasher)
    {
        try{
            $stage->update([
                'name' => ['ar'=> $request->stage_name_ar , 'en' => $request->stage_name_en],
                'notes' => ['ar'=> $request->notes_ar , 'en' => $request->notes_en]
            ]);
            $flasher->addSuccess(__('stages.edit_success'));
            return redirect()->route('stages.index');
        }
        catch( \Exception $err)
        {
            $flasher -> addError($err ->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Stage  $stage
     * @param FlasherInterface $flasher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Stage $stage , FlasherInterface $flasher)
    {
        try {
            if ($stage->grades()->count() == 0 )
            {
                $stage->delete();
                $flasher->addSuccess('stages.delete_success');
            }
            else
               $flasher->addError('stages.stage_has_children');
        }
        catch (\Exception $err){
            $flasher -> addError($err ->getMessage());
        }
        return redirect()->back();
    }
}
