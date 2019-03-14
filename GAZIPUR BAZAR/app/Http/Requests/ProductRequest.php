<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_code'=>'required',
            'product_name'=>'required',
            'category'=>'required',
            'seze'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'newarrival'=>'required',
            'image1'=>'required',
            'image2'=>'required',
            'specifications'=>'required',
        ];
    }
}
