<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'unique:categories,name,'.$this->category],
            'status' => ['required'],
            'parent_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Trường này không được để rỗng!",
            'name.unique' => "Tên này đẽ tồn tại!",
            'status.required' => "Trường này không được để rỗng!",
            'parent_id.required' => "Trường này không được để rỗng!",
        ];
    }
}
