<?php

namespace App\Http\Requests\Jobs;

use Illuminate\Foundation\Http\FormRequest;

class JobsStoreRequest extends FormRequest
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
            'employer_id'     => 'required|exists:employers,id',
            'title'           => 'required|string|max:255',
            'slug'            => 'nullable|string|max:255|unique:jobs,slug',
            'type'            => 'required|string|max:100',
            'employment_type' => 'required|string|max:100',
            'location'        => 'nullable|string|max:255',
            'salary_min'      => 'nullable|numeric|min:0',
            'salary_max'      => 'nullable|numeric|min:0|gte:salary_min',
            'currency'        => 'nullable|string|max:10',
            'description'     => 'required|string',
            'requirements'    => 'nullable|string',
            'status'          => 'required|string|max:50',
            'published_at'    => 'nullable|date',
            'expires_at'      => 'nullable|date|after_or_equal:published_at',
        ];
    }

    public function messages(): array
    {
        return [
            'employer_id.required' => 'Vui lòng chọn nhà tuyển dụng.',
            'employer_id.exists'   => 'Nhà tuyển dụng không tồn tại.',
            'title.required'       => 'Tiêu đề công việc là bắt buộc.',
            'slug.unique'          => 'Slug đã tồn tại.',
            'type.required'        => 'Loại công việc là bắt buộc.',
            'employment_type.required' => 'Hình thức tuyển dụng là bắt buộc.',
            'salary_max.gte'       => 'Lương tối đa phải lớn hơn hoặc bằng lương tối thiểu.',
            'description.required' => 'Mô tả công việc là bắt buộc.',
            'status.required'      => 'Trạng thái công việc là bắt buộc.',
            'expires_at.after_or_equal' => 'Ngày hết hạn phải lớn hơn hoặc bằng ngày đăng tuyển.',
        ];
    }
}
