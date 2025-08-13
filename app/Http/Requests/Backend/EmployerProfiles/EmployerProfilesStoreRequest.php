<?php

namespace App\Http\Requests\Backend\EmployerProfiles;

use Illuminate\Foundation\Http\FormRequest;

class EmployerProfilesStoreRequest extends FormRequest
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
            'UserId'            => 'required|integer|exists:users,id',
            'company_name'      => 'required|string|max:255',
            'website'           => 'nullable|url|max:255',
            'description'       => 'nullable|string|max:2000',
            'billing_account_id'=> 'nullable|integer|exists:billing_accounts,id',
        ];
    }

    public function messages(): array
    {
        return [
            'UserId.required'            => 'Người dùng là bắt buộc.',
            'UserId.integer'             => 'Người dùng phải là kiểu số nguyên.',
            'UserId.exists'              => 'Người dùng không tồn tại trong hệ thống.',

            'company_name.required'      => 'Tên công ty là bắt buộc.',
            'company_name.string'        => 'Tên công ty phải là chuỗi ký tự.',
            'company_name.max'           => 'Tên công ty không được vượt quá 255 ký tự.',

            'website.url'                => 'Website phải là đường dẫn hợp lệ.',
            'website.max'                 => 'Website không được vượt quá 255 ký tự.',

            'description.string'         => 'Mô tả phải là chuỗi ký tự.',
            'description.max'            => 'Mô tả không được vượt quá 2000 ký tự.',

            'billing_account_id.integer' => 'ID tài khoản thanh toán phải là kiểu số nguyên.',
            'billing_account_id.exists'  => 'Tài khoản thanh toán không tồn tại trong hệ thống.',
        ];
    }
}
