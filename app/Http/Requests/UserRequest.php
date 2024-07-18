<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'avt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được dài quá 255 ký tự.',
            'avt.image' => 'Hình ảnh phải là một tệp hình ảnh.',
            'avt.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'avt.max' => 'Hình ảnh không được lớn hơn 2048 KB.',
            'avt.required' => 'Hình ảnh không được để trống.',

        ];
    }
}
