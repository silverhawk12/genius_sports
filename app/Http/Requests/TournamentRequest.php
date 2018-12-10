<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Tournament;

class TournamentRequest extends FormRequest
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
        $possibleNumberOfTeams = implode(",",Tournament::getAllowedTeamNumbers());
        
        return [
            'name' => 'required|unique:tournaments|max:100',
            'number_of_teams' => 'in:'.$possibleNumberOfTeams
        ];
    }
    
}
