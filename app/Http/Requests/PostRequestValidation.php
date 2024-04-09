<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequestValidation extends FormRequest
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
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif',
         ];

         foreach (config('app.languages') as $key => $value) {
            $data[$key.'.title'] = 'required|nullable|string|nullable';
            $data[$key.'.content'] = 'required|string|nullable';
            $data[$key.'.smalldesc'] = 'required|string|nullable|max:100';
            $data[$key.'.tags'] = 'requird|string|nullable';
         }

    }
    public function messages(){
        return [
            'content.required'=>__('words.content is required'),
            'content.string'=>__('words.content is string'),
            'smalldesc.required'=>__('words.smallDesc must be required'),
            'smalldesc.max'=>__('words.smallDesc must be less than 50 '),
            'tags.required'=>__('words.tags must be required'),
            'tags.string'=>__('words.tags is string'),

        ];
    }
}
