<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventWeddingRequest extends FormRequest
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
            // 'image1'=>'required',
            // 'image2'=>'required',
            'heading1'=>'required',
            'paragraph1'=>'required',
            'heading2'=>'required',
            'paragraph2'=>'required',
            'heading3'=>'required',
            'paragraph3'=>'required',
        ];
    }
}
