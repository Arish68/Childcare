<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
            
            'title'=>['required','string','max:255'],
            'description'=>['required','string'],
            'meeting_date'=>['required','date'],
            'meeting_time'=>['required'],
            'address'=>['required','string'],
            'image'=>['required','mimes:jpeg,jpg,png']
        ];
    }
}
