<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name'=>'required',
            'username'=>'required| unique:tbl_user,username',
            'email'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
        ];
    }
}
