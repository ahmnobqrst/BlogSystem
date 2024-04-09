<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
                $data[$key.'.content'] = 'string|nullable';
             }

             //$validatedate = $request->validate($data);
    }
}
