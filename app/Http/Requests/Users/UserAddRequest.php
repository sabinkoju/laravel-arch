<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'designation_id'=>'required',
            'user_group_id'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users,email,NULL,id,deleted_at,NULL',
            'avatar_image'=>'mimes:jpg,jpeg,png',
            'user_status'=>'required'
        ];
    }
}
