<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|min:0',
            'phone' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
        'name.required' => 'Tên là bắt buộc.',
        'name.string' => 'Tên phải là một chuỗi ký tự.',
        'name.max' => 'Tên không được dài quá 255 ký tự.',
        'email.required' => 'Email là bắt buộc.',
        'email.email' => 'Email phải có định dạng hợp lệ.',
        'address.required' => 'Địa chỉ là bắt buộc.',
        'phone.numeric' => 'Số điện thoại phải là một số.',
        'phone.required' => 'SĐT là bắt buộc.',

        // 'phone.max' => 'Số điện thoại không được dài quá 11 ký tự.',
        ];
    }
}
