<?php

namespace App\Http\Requests\SchoolYears;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolYearsRequest extends FormRequest
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
            'name' => 'required|unique:school_years,name,'. $this->id,
            'start_date' => 'required|date|unique:school_years,start_date,'. $this->id,
            'end_date' => 'required|date|after:start_date|unique:school_years,end_date,'. $this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('school_years.valid_name_required'),
            'name.unique' => __('school_years.valid_name_unique'),
            'start_date.required' => __('school_years.valid_start_date_required'),
            'start_date.unique' => __('school_years.valid_start_date_unique'),
            'start_date.date' => __('school_years.valid_start_date_date'),
            'end_date.required' => __('school_years.valid_end_date_required'),
            'end_date.unique' => __('school_years.valid_end_date_unique'),
            'end_date.date' => __('school_years.valid_end_date_date'),
            'end_date.after' => __('school_years.valid_end_date_after'),
        ];
    }
}
