<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Match;

class inMatches implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $matchIds = array_keys($value);
        foreach($matchIds as $id){
            $match = Match::find($id);
            if($match){
                return true;
            }else{
                return false;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Matches do not exist';
    }
}
