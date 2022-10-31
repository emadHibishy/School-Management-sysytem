<?php

namespace App\Http\Requests\Classroom;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
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
            'classroom_name' => 'required',
            'grade_id' => 'required|integer',
            'stage_id' => 'required|integer',
            'staus' => 'boolean'
        ];
    }

    public function messages() :array
    {
        return [
            'classroom_name.required' => __('classrooms.valid_required_name') ,
            'grade_id.required' => __('classrooms.valid_required_grade'),
            'grade_id.integer' => __('classrooms.valid_integer_grade'),
            'stage_id.required' => __('classrooms.valid_required_stage'),
            'stage_id.integer' => __('classrooms.valid_integer_stage'),
        ];
    }
}
