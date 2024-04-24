<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUniversityRequest extends FormRequest
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
                Rule::unique('universities')->ignore($this->university),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên trường đại học là trường bắt buộc.', 
            'name.max' => 'Tên trường đại học không được dài quá :max ký tự.', 
            'name.unique' => 'Trường đại học đã tồn tại.', 
        ];
    }
}
