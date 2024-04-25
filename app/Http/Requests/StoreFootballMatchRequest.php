<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFootballMatchRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'tournament_id.required' => 'Tên giải đấu là trường bắt buộc.',
            'team1_id.required' => 'Đội 1 là trường bắt buộc.',
            'team2_id.required' => 'Đội 2 là trường bắt buộc.',
        ];
    }
}
