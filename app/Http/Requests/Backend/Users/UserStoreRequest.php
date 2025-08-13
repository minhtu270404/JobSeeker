<?php

namespace App\Http\Requests\Backend\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'      => 'required|string|max:50|unique:users,username',
            'phone'         => 'nullable|string|max:20',
            'email'         => 'required|email|max:255|unique:users,email',
            'password'      => 'required|string|min:8|confirmed',
            'first_name'     => 'nullable|string|max:100',
            'last_name'      => 'nullable|string|max:100',
            'photo'         => 'nullable|string|max:255',
            'address'       => 'nullable|string|max:255',
            'gender'        => 'nullable|in:male,female,other',
            'birthday'      => 'nullable|date|before:today',
            'is_active'     => 'boolean',
            'is_delete'     => 'boolean',
            'group_role'     => 'nullable|string|max:50',
            'otp_code'      => 'nullable|string|max:10',
            'otp_expires_at'=> 'nullable|date',
            'otp_attempts'  => 'nullable|integer|min:0',
            'otp_context'   => 'nullable|string|max:255',
            'last_login_ip' => 'nullable|ip',
            'last_login_at' => 'nullable|date',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.unique'   => 'Tên đăng nhập đã tồn tại.',
            'username.max'      => 'Tên đăng nhập không được vượt quá 50 ký tự.',

            'email.required'    => 'Vui lòng nhập email.',
            'email.email'       => 'Email không hợp lệ.',
            'email.unique'      => 'Email đã được sử dụng.',
            'email.max'         => 'Email không được vượt quá 255 ký tự.',

            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min'      => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.confirmed'=> 'Mật khẩu xác nhận không khớp.',

            'birthday.date'     => 'Ngày sinh không hợp lệ.',
            'birthday.before'   => 'Ngày sinh phải nhỏ hơn ngày hiện tại.',

            'gender.in'         => 'Giới tính chỉ chấp nhận: male, female, hoặc other.',
            'last_login_ip.ip'  => 'Địa chỉ IP đăng nhập cuối không hợp lệ.',
        ];
    }
}
