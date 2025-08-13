<?php

namespace App\Http\Requests\Backend\JobsApplications;

use Illuminate\Foundation\Http\FormRequest;

class JobsApplicationsUpdateRequest extends FormRequest
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
            'candidate_id'    => 'sometimes|exists:candidates,id',
            'cover_letter'    => 'nullable|string|max:2000',
            'resume_file_id'  => 'sometimes|exists:files,id',
            'status'          => 'sometimes|string|in:pending,reviewed,accepted,rejected',
            'applied_at'      => 'sometimes|date',
        ];
    }

    public function messages(): array
    {
        return [
            'candidate_id.exists'     => 'Ứng viên không tồn tại.',
            'cover_letter.max'        => 'Thư giới thiệu tối đa 2000 ký tự.',
            'resume_file_id.exists'   => 'Hồ sơ không tồn tại.',
            'status.in'               => 'Trạng thái không hợp lệ.',
            'applied_at.date'         => 'Ngày ứng tuyển không hợp lệ.',
        ];
    }
}
