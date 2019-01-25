<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditDogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          =>  'bail|required|unique:dog_categories,name,' .$this->segment(4)
            'price'         =>  'required|numeric',
            'category_id'   =>  'required',
            'photos.*'      =>  'required|image',
            'sale'          =>  'numeric|nullable',
            'heigt'         =>  'numeric|nullable',
            'weight'        =>  'numeric|nullable',
        ];
    }
}
