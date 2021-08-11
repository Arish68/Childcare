<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;


class AddUserRequest extends FormRequest
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
            
            'firstname'=>['required','string','max:255'],

            'lastname'=>['required','string','max:255'],

            'email'=>['required','email','max:255','string','unique:customers'],

            'password'=>['required','string','min:6'],

            'type'=>['required','integer'],

            'image'=>['mimes:jpeg,jpg,png,svg'],

            'phone_no'=>['required','string'],

            'address'=>['required','string'],

            'gender'=>['required','string']
        ];
    }

 
}
