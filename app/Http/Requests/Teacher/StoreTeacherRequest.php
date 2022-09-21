<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'ar_teacher_name' => ['required','regex:/\p{Arabic}/u'],
            'en_teacher_name' => ['required','regex:/^[a-zA-Z -_]+$/'],
            'email' => 'required|email|unique:teachers,email,' . $this->id,
            'password' => 'required',
            'specialization' => 'required',
            'gender' => 'required',
            'address' => 'required|max:250',
            'start_date' => 'required|date',
            'birth_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'ar_teacher_name.required' => __('teachers.valid_required_ar_name'),
            'ar_teacher_name.regex' => __('teachers.valid_regex_ar_name'),
            'en_teacher_name.required' => __('teachers.valid_required_en_name'),
            'en_teacher_name.regex' => __('teachers.valid_regex_en_name'),
            'email.required' => __('teachers.valid_email_required'),
            'email.email' => __('teachers.valid_email_email'),
            'email.unique' => __('teachers.valid_email_unique'),
            'password.required' => __('teachers.valid_password_required'),
            'specialization.required' => __('teachers.valid_specialization_required'),
            'gender.required' => __('teachers.valid_gender_required'),
            'address.required' => __('teachers.valid_address_required'),
            'address.max' => __('teachers.valid_address_max'),
            'start_date.required' => __('teachers.valid_start_date_required'),
            'birth_date.required' => __('teachers.valid_birth_date_required'),
            'start_date.date' => __('teachers.valid_start_date_date'),
            'birth_date.date' => __('teachers.valid_birth_date_date'),
        ];
    }
}
