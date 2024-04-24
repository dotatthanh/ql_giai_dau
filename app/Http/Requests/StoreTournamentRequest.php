<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTournamentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'max:255',
            ],
            'description' => 'required',
            'image' => 'required|image',
            'group_number' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề là trường bắt buộc.', 
            'name.max' => 'Tiêu đề không được dài quá :max ký tự.', 
            'description.required' => 'Mô tả là trường bắt buộc.', 
            'image.required' => 'Ảnh là trường bắt buộc.', 
            'image.image' => 'Ảnh phải là hình ảnh (jpg, jpeg, png, bmp, gif, svg hoặc webp).',
            'group_number.required' => 'Số bảng đấu là trường bắt buộc.',
            'group_number.number' => 'Số bảng đấu phải là kiểu số.',
            'group_number.min' => 'Số bảng đấu ít nhất phải là 1.', 
        ];
    }
}
