<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class AdminDogCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()) {
           return true;
       }
        return redirect()->route('not-allow');    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>  'required|unique:dog_categories|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'You must type name',
            'name.unique' => 'The name has already exsit'
        ];
    }
}
