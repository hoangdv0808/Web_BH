<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userListRequest extends FormRequest
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
            'full_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,'.$this->userList],
            'password' => !$this->userList ? ['required', 'min:6', ] : '',
            'password_confirmation' => !$this->userList ? ['required', 'min:6', "same:password"] : '',
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'full_name.required' =>'Trường này không được để trống!',
            'email.unique' =>'Email đã được đăng ký!',
            'email.required' =>'Trường này không được để trống!',
            'email.email' =>'Trường này phải là email!',
            'password.required' =>'Trường này không được để trống!',
            'password.min' =>'Mật khẩu tối thiểu 6 ký tự!',
            'password_confirmation.required' =>'Trường này không được để trống!',
            'password_confirmation.min' =>'Mật khẩu tối thiểu 6 ký tự!',
            'password_confirmation.same' =>'Mật khẩu xác nhận không chính xác!',
            'phone.required' =>'Trường này không được để trống!',
            'phone.numeric' =>'Trường này phải là số!',
            'address.required' =>'Trường này không được để trống!',
        ];
    }
}
