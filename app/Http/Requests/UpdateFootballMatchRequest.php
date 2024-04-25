<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFootballMatchRequest extends FormRequest
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
            'tournament_id' => 'required', 
            'team1_id' => 'required',
            'team2_id' => 'required',
            'score_team1' => 'nullable|numeric|min:0',
            'score_team2' => 'nullable|numeric|min:0',
            'description' => 'nullable|max:255',
        ];
    }

    public function messages()
    {
        return [
            'tournament_id.required' => 'Tên giải đấu là trường bắt buộc.',
            'team1_id.required' => 'Đội 1 là trường bắt buộc.',
            'team2_id.required' => 'Đội 2 là trường bắt buộc.',
            'score_team1.numeric' => 'Điểm đội 1 phải là kiểu số.',
            'score_team1.min' => 'Điểm đội 1 ít nhất phải là 0.',
            'score_team2.numeric' => 'Điểm đội 2 phải là kiểu số.',
            'score_team2.min' => 'Điểm đội 2 ít nhất phải là 0.',
            'description.max' => 'Mô tả không được quá 255 ký tự.',
        ];
    }
}
