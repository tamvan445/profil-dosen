<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLecturerRequest extends FormRequest
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
            'nidn' => 'required',
            'lecturerPhoto' => [
                'required',
                'image',
                'mimes:jpg',
                Rule::dimensions()->maxWidth(1200)->maxHeight(700),
            ],
            'college_id' => 'required',
            'studyProgram' => 'required',
            'gender' => 'required', 
            'lastEducation' =>'required'
        ];
    }
}
