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
            'name' => ['required', 'unique:products,name,' .$this->product],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['required', 'numeric', 'min:0', 'max:'.$this->price],
            'capacity' => ['required'],
            'ingredients' => ['required'],
            'photo' => [!$this->product ? 'required' : '', 'image'],
            // 'photos' => [!$this->product ? 'required' : '', 'image', 'mimes:png,jpg'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'description' => ['required'],
        ];
    }
    function messages()
    {
        return [
            'name.required' => 'Trường này không được để trống!',
            'name.unique' => 'Tên này đã tồn tại!',
            'price.required' => 'Trường này không được để trống!',
            'price.numeric' => 'Phải nhập số!',
            'price.min' => 'Nhập tối thiểu bằng 0!',
            'sale_price.required' => 'Trường này không được để trống!',
            'sale_price.numeric' => 'Phải nhập số!',
            'sale_price.min' => 'Nhập tối thiểu bằng 0!',
            'sale_price.max' => 'Không được nhập quá giá tiền!',
            'capacity.required' => 'Trường này không được để trống!',
            'ingredients.required' => 'Trường này không được để trống!',
            'photo.required' => 'Bạn phải chọn ảnh!',
            'photo.image' => 'Bạn phải chọn ảnh!',
            'photo.mimes' => 'Ảnh phải có dạng jpg hoặc png!',
            // 'photos.required' => 'Bạn phải chọn ảnh!',
            // 'photos.image' => 'Bạn phải chọn ảnh!',
            // 'photos.mimes' => 'Ảnh phải có dạng jpg hoặc png!',
            'category_id.required' => 'Trường này không được để trống!',
            'brand_id.required' => 'Trường này không được để trống!',
            'description.required' => 'Trường này không được để trống!',
        ];
    }
}
