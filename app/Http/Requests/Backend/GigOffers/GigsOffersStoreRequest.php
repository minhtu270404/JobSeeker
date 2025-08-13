<?php

namespace App\Http\Requests\Backend\GigsOffers;

use Illuminate\Foundation\Http\FormRequest;

class GigsOffersStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'gig_id'                => 'required|integer|exists:gigs,id',
            'contractor_id'         => 'required|integer|exists:contractors,id',
            'proposed_price_cents'  => 'required|integer|min:0',
            'proposed_deadline'     => 'required|date|after:today',
            'message'               => 'nullable|string',
            'status'                => 'required|in:pending,accepted,rejected'
        ];
    }

    public function messages(): array
    {
        return [
            'gig_id.required'               => 'Vui lòng chọn gig.',
            'gig_id.integer'                => 'ID gig phải là số.',
            'gig_id.exists'                 => 'Gig không tồn tại.',

            'contractor_id.required'        => 'Vui lòng chọn contractor.',
            'contractor_id.integer'         => 'ID contractor phải là số.',
            'contractor_id.exists'          => 'Contractor không tồn tại.',

            'proposed_price_cents.required' => 'Vui lòng nhập giá đề xuất.',
            'proposed_price_cents.integer'  => 'Giá đề xuất phải là số nguyên.',
            'proposed_price_cents.min'      => 'Giá đề xuất không được âm.',

            'proposed_deadline.required'    => 'Vui lòng nhập hạn chót.',
            'proposed_deadline.date'        => 'Hạn chót phải là ngày hợp lệ.',
            'proposed_deadline.after'       => 'Hạn chót phải sau ngày hôm nay.',

            'message.string'                => 'Tin nhắn phải là chuỗi ký tự.',

            'status.required'               => 'Vui lòng chọn trạng thái.',
            'status.in'                      => 'Trạng thái không hợp lệ.'
        ];
    }
}
