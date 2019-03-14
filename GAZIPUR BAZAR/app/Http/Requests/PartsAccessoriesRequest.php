<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartsAccessoriesRequest extends FormRequest
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
            'heading1'=>'required',
            'paragraph'=>'required',
            // 'image1'=>'required',
            // 'image2'=>'required',
        ];
    }
}
