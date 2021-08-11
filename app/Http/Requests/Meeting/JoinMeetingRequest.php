<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class JoinMeetingRequest extends FormRequest
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
            
            'customer_id'=>['required','integer','exists:App\Models\Customer,id'],
            'meeting_id'=>['required','integer','exists:App\Models\Meeting,id'],
        ];
    }
}
