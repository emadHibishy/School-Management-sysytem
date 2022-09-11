<?php

namespace App\Http\Requests\Stage;

use Illuminate\Foundation\Http\FormRequest;

class storeStageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        dd($this);
        return [
            "stage_name_ar" => ['required','regex:/\p{Arabic}/u', 'unique:stages,name->ar,'. $this->id],
            "stage_name_en" => ['required','regex:/^[a-zA-Z0-9 ]+$/', 'unique:stages,name->en,'. $this->id],
            "notes_ar" => ['nullable', 'string', 'regex:/\p{Arabic}/u'],
            "notes_en" => ['nullable', 'string', 'regex:/^[a-zA-Z0-9 ]+$/']
        ];
    }

    public function messages()
    {
        return [
            'stage_name_ar.required' => __('stages.valid_required_ar_name'),
            'stage_name_en.required' => __('stages.valid_required_en_name'),
            'stage_name_ar.regex' => __('stages.valid_regex_ar_name'),
            'stage_name_en.regex' => __('stages.valid_regex_en_name'),
            'stage_name_ar.unique' => __('stages.valid_unique_ar_name'),
            'stage_name_en.unique' => __('stages.valid_unique_en_name'),
            'notes_ar.string' => __('stages.valid_ar_notes'),
            'notes_en.string' => __('stages.valid_en_notes'),
            'notes_ar.regex' => __('stages.valid_ar_notes'),
            'notes_en.regex' => __('stages.valid_en_notes'),
        ];
    }
}
