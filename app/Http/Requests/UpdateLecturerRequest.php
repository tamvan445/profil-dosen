<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLecturerRequest extends FormRequest
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
            'name' => 'required',
            'nidn' => 'required|unique:lecturers',
            'photo' => 'dimensions:min_width=100,min_height=200',
            'college_id' => 'required',
            'studyProgram' => 'required',
            'gender' => 'required', 
            'lastEducation' =>'required'
        ];
    }
}
