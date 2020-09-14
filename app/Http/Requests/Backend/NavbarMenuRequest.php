<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NavbarMenuRequest extends FormRequest
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
            // 'parent_id' => 'required',
            'navbar_menu_name' => 'required',
            // 'page_slug' => 'required',
            'navbar_menus_status' => 'required',
        ];
    }
}
