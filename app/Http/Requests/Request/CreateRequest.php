<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            
            'customer_id' =>['required','integer'],
            'address'     =>['required'],
            'service'     =>['required','string','max:255'],
            'from'        =>['required','date_format:Y-m-d H:i:s'],
            'to'          =>['required','date_format:Y-m-d H:i:s','after:from']
        ];
    }

    public function messages(){

        return [

            'customer_id.required'=>'User id is required'
        ];
        
    }
}
