<?php

namespace App\Http\Requests\Backend\Gigs;

use Illuminate\Foundation\Http\FormRequest;

class GigsUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id'     => 'nullable|integer|exists:clients,id',
            'title'         => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'price_cents'   => 'nullable|integer|min:0',
            'currency'      => 'nullable|string|size:3',
            'deliverables'  => 'nullable|string',
            'status'        => 'nullable|in:draft,published',
            'visibility'    => 'nullable|in:public,private',
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.integer'     => 'ID khách hàng phải là số.',
            'client_id.exists'      => 'Khách hàng không tồn tại.',

            'title.string'          => 'Tiêu đề phải là chuỗi ký tự.',
            'title.max'             => 'Tiêu đề không được vượt quá 255 ký tự.',

            'description.string'    => 'Mô tả phải là chuỗi ký tự.',

            'price_cents.integer'   => 'Giá phải là số nguyên.',
            'price_cents.min'       => 'Giá không được âm.',

            'currency.string'       => 'Tiền tệ phải là chuỗi ký tự.',
            'currency.size'         => 'Tiền tệ phải gồm 3 ký tự.',

            'deliverables.string'   => 'Thông tin deliverables phải là chuỗi.',

            'status.in'             => 'Trạng thái không hợp lệ.',

            'visibility.in'         => 'Chế độ hiển thị không hợp lệ.',
        ];
    }
}
