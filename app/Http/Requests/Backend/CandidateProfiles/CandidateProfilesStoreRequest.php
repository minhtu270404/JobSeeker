<?php

namespace App\Http\Requests\Backend\CandidateProfiles;

use Illuminate\Foundation\Http\FormRequest;

class CandidateProfilesStoreRequest extends FormRequest
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
            'UserId'         => 'required|integer|exists:users,id',
            'headline'       => 'required|string|max:255',
            'summary'        => 'nullable|string|max:2000',
            'location'       => 'nullable|string|max:255',
            'skills'         => 'nullable|string|max:1000',
            'resume_file_id' => 'nullable|integer|exists:files,id',
            'visibility'     => 'required|in:public,private',
        ];
    }

    public function messages(): array
    {
        return [
            'UserId.required'        => 'Người dùng là bắt buộc.',
            'UserId.integer'         => 'Người dùng phải là kiểu số nguyên.',
            'UserId.exists'          => 'Người dùng không tồn tại trong hệ thống.',
            
            'headline.required'      => 'Tiêu đề hồ sơ là bắt buộc.',
            'headline.string'        => 'Tiêu đề hồ sơ phải là chuỗi ký tự.',
            'headline.max'           => 'Tiêu đề hồ sơ không được vượt quá 255 ký tự.',

            'summary.string'         => 'Tóm tắt phải là chuỗi ký tự.',
            'summary.max'            => 'Tóm tắt không được vượt quá 2000 ký tự.',

            'location.string'        => 'Địa điểm phải là chuỗi ký tự.',
            'location.max'           => 'Địa điểm không được vượt quá 255 ký tự.',

            'skills.string'          => 'Kỹ năng phải là chuỗi ký tự.',
            'skills.max'             => 'Kỹ năng không được vượt quá 1000 ký tự.',

            'resume_file_id.integer' => 'ID file CV phải là kiểu số nguyên.',
            'resume_file_id.exists'  => 'File CV không tồn tại trong hệ thống.',

            'visibility.required'    => 'Trạng thái hiển thị là bắt buộc.',
            'visibility.in'          => 'Trạng thái hiển thị chỉ được phép là public hoặc private.',
        ];
    }
}
