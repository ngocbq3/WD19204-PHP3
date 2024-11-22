<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title'     => ['required', 'min:6'],
            'image'     => ['nullable', 'image', 'max:2048'],
            'view'      => ['required', 'integer', 'min:0'],
        ];
    }
    //thông báo lỗi
    public function messages()
    {
        return [
            'title.required'    => 'Bạn phải nhập title',
            'title.min'         => 'Title phải ít nhất 6 ký tự',
            'image.image'       => 'Image phải là hình ảnh',
            'view.required'     => 'Bạn chưa nhập view',
            'view.integer'      => 'View là số nguyên',
            'view.min'          => 'View không được là số âm'
        ];
    }
}
