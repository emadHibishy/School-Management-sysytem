<?php

namespace App\Http\Requests\Subject;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
            'ar_name' => ['required', 'regex:/\p{Arabic}/u', 'unique:subjects,name->ar,'.$this->id],
            'en_name' => ['required', 'regex:/^[a-zA-Z0-9 ]+$/', 'unique:subjects,name->en,'.$this->id],
        ];
    }

    public function messages()
    {
        return [
            'ar_name.required'=> __('subjects.valid_name_ar_required'),
            'ar_name.regex'=> __('subjects.valid_name_ar_regex'),
            'ar_name.unique'=> __('subjects.valid_name_ar_unique'),
            'en_name.required'=> __('subjects.valid_name_en_required'),
            'en_name.regex'=> __('subjects.valid_name_en_regex'),
            'en_name.unique'=> __('subjects.valid_name_en_unique'),
        ];
    }
}
