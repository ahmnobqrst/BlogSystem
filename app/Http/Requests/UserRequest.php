<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\PostRequestValidation;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return  $data = [
            'name'=>'required|string',
            'status'=>'nullable|in:null,admin,writer',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:8|confirmed|string',
        ];
    }

    public function messages(){

        return [

            'name.required'=>__('words.username is required'),
            'name.string'=>__('words.username must be string'),
            'password.required'=>__('words.password required'),
        ];
    }
}
