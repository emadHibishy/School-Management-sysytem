<?php

namespace App\Http\Requests\Grade;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
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
        return [
            'grade_name_ar' => ['required','regex:/\p{Arabic}/u', 'unique:grades,name->ar,'. $this->id],
            'grade_name_en' => ['required','regex:/^[a-zA-Z0-9 ]+$/', 'unique:grades,name->en,'. $this->id],
            'stage_id' => ['required']
        ];
    }

    public function messages() :array
    {
        return [
            'grade_name_ar.required' => __('grades.valid_required_ar_name') ,
            'grade_name_en.required' => __('grades.valid_required_en_name') ,
            'grade_name_ar.regex' => __('grades.valid_regex_ar_name') ,
            'grade_name_en.regex' => __('grades.valid_regex_en_name') ,
            'grade_name_ar.unique' => __('grades.valid_unique_ar_name') ,
            'grade_name_en.unique' => __('grades.valid_unique_en_name') ,
            'stage_id.required' => __('grades.valid_required_stage'),
            'stage_id.integer' => __('grades.valid_integer_stage'),
        ];
    }
}
