<?php

namespace App\Http\Requests\Backend\Gigs;

use Illuminate\Foundation\Http\FormRequest;

class GigsStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id'     => 'required|integer|exists:clients,id',
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'price_cents'   => 'required|integer|min:0',
            'currency'      => 'required|string|size:3',
            'deliverables'  => 'nullable|string',
            'status'        => 'required|in:draft,published',
            'visibility'    => 'required|in:public,private',
        ];
    }

    public function messages(): array
    {
        return [
            'client_id.required'    => 'Vui lòng chọn khách hàng.',
            'client_id.integer'     => 'ID khách hàng phải là số.',
            'client_id.exists'      => 'Khách hàng không tồn tại.',
            
            'title.required'        => 'Tiêu đề không được để trống.',
            'title.string'          => 'Tiêu đề phải là chuỗi ký tự.',
            'title.max'             => 'Tiêu đề không được vượt quá 255 ký tự.',
            
            'description.required'  => 'Vui lòng nhập mô tả.',
            'description.string'    => 'Mô tả phải là chuỗi ký tự.',

            'price_cents.required'  => 'Vui lòng nhập giá.',
            'price_cents.integer'   => 'Giá phải là số nguyên.',
            'price_cents.min'       => 'Giá không được âm.',

            'currency.required'     => 'Vui lòng nhập loại tiền tệ.',
            'currency.string'       => 'Tiền tệ phải là chuỗi ký tự.',
            'currency.size'         => 'Tiền tệ phải gồm 3 ký tự.',

            'deliverables.string'   => 'Thông tin deliverables phải là chuỗi.',

            'status.required'       => 'Vui lòng chọn trạng thái.',
            'status.in'             => 'Trạng thái không hợp lệ.',

            'visibility.required'   => 'Vui lòng chọn chế độ hiển thị.',
            'visibility.in'         => 'Chế độ hiển thị không hợp lệ.',
        ];
    }
}
