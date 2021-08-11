<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class MeetingCommentRequest extends FormRequest
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
            
            'current_id' =>['required','integer','exists:App\Models\Customer,id'],
            'meeting_id' =>['required','integer','exists:App\Models\Meeting,id'],
            'message' =>['required','string'],

        ];
    }
}
