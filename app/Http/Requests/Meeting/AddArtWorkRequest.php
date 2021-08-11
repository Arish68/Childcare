<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;


class AddArtWorkRequest extends FormRequest
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


    public function rules()
    {
        return [
            
            'parant_id'  =>['required','string','max:255'],
            'parant_title'=>['required','string','max:255'],
            'lesson_id'  =>['required','string','max:255'], //Hidden Field
            'teacher_id' =>['required','string','max:255'], //Hidden Field
            'image'=>['required','mimes:jpeg,jpg,png'],
            'remarks'=>['required','string']

           
        ];
    }

 
}
