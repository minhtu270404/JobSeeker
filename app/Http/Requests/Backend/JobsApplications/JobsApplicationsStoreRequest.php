<?php

namespace App\Http\Requests\Backend\JobsApplications;

use Illuminate\Foundation\Http\FormRequest;

class JobsApplicationsStoreRequest extends FormRequest
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
            'candidate_id'    => 'required|exists:candidates,id',
            'cover_letter'    => 'nullable|string|max:2000',
            'resume_file_id'  => 'required|exists:files,id',
            'status'          => 'required|string|in:pending,reviewed,accepted,rejected',
            'applied_at'      => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'candidate_id.required'   => 'Vui lòng chọn ứng viên.',
            'candidate_id.exists'     => 'Ứng viên không tồn tại.',
            'cover_letter.max'        => 'Thư giới thiệu tối đa 2000 ký tự.',
            'resume_file_id.required' => 'Vui lòng tải lên hồ sơ.',
            'resume_file_id.exists'   => 'Hồ sơ không tồn tại.',
            'status.required'         => 'Vui lòng chọn trạng thái.',
            'status.in'               => 'Trạng thái không hợp lệ.',
            'applied_at.required'     => 'Vui lòng nhập ngày ứng tuyển.',
            'applied_at.date'         => 'Ngày ứng tuyển không hợp lệ.',
        ];
    }
}
