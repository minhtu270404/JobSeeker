<?php

namespace App\Http\Requests\Backend\GigsOffers;

use Illuminate\Foundation\Http\FormRequest;

class GigsOffersUpdateRequest extends FormRequest
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
            'gig_id' => 'required|exists:gigs,id',
            'contractor_id' => 'required|exists:contractors,id',
            'proposed_price_cents' => 'required|integer|min:0',
            'proposed_deadline' => 'required|date',
            'message' => 'nullable|string|max:1000',
            'status' => 'required|string|in:pending,accepted,rejected'
        ];
    }

    public function messages(): array
    {
        return [
            'gig_id.required' => 'Vui lòng chọn gig.',
            'gig_id.exists' => 'Gig không tồn tại.',
            'contractor_id.required' => 'Vui lòng chọn contractor.',
            'contractor_id.exists' => 'Contractor không tồn tại.',
            'proposed_price_cents.required' => 'Vui lòng nhập giá đề xuất.',
            'proposed_deadline.required' => 'Vui lòng nhập hạn chót.',
            'status.in' => 'Trạng thái không hợp lệ.'
        ];
    }

}
