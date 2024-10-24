<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => ['required', 'unique:brands,name,'.$this->brand],
            'status' => ['required'],
            'photo' => [!$this->brand ? 'required' : '', 'image', 'mimes:png,jpg'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Trường này không được để rỗng!",
            'name.unique' => "Tên này đẽ tồn tại!",
            'status.required' => "Trường này không được để rỗng!",
            'photo.required' => "Trường này không được để rỗng!",
            'photo.image' => "Phải chọn ảnh!",
            'photo.mimes' => "Ảnh phải có dạng jpg hoặc png!",
        ];
    }
}
