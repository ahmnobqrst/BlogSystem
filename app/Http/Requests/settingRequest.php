<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class settingRequest extends FormRequest
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
     return $data = [
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif',
            'favicon'=>'nullable|image|mimes:jpeg,png,jpg,gif',
            'facebook'=>'string|nullable|required',
            'instgram'=>'string|nullable',
            'phone'=>'required|nullable|numeric|nullable',
            'email'=>'email|nullable',
        ];
    
        foreach (config('app.languages') as $key => $value) {
            $data[$key.'.title'] = 'required|nullable|string|nullable';
            $data[$key.'.content'] = 'string|nullable';
            $data[$key.'.address'] = 'string|nullable';
        }
    }
    public function messages(){
        return [
            'facebook.required'=>__('words.facebook is required'),
            'phone.required'=>__('words.phone is required'),
            'phone.numeric'=>__('words.phone must be number'),


        ];
    }
}
