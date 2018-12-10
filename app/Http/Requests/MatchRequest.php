<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
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
            'matches.*.*' => 'exists:teams,id|distinct',
            'round_results' => [new \App\Rules\inMatches],
            'round_results.*' => [new \App\Rules\notEqual],
            'round_results.*.*' => 'integer'
        ];

    }
    
    
}
