<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeamRequest extends FormRequest
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
                Rule::unique('teams')->ignore($this->type),
            ],
            'logo' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên đội bóng là trường bắt buộc.', 
            'name.max' => 'Tên đội bóng không được dài quá :max ký tự.', 
            'name.unique' => 'Đội bóng đã tồn tại.', 
            'logo.image' => 'Logo phải là hình ảnh (jpg, jpeg, png, bmp, gif, svg hoặc webp).',
        ];
    }
}
