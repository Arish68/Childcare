<?php

namespace App\Http\Requests\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class LessonCategoryRequest extends FormRequest
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
            
            //'category_id'=>['required','integer','max:255'],
            'title'=>['required','string','max:255'],
            'purpose'=>['required','string'],
            'description'=>['required','string'],
            //'supplies_2'=>['required','string'],
            //'meeting_date'=>['required','date'],
           // 'meeting_time'=>['required'],
            //'address'=>['required','string'],
            //'image'=>['required','mimes:jpeg,jpg,png']
        ];
    }
}
