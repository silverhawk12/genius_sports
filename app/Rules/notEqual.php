<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class notEqual implements Rule
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
        return (count(array_unique($value)) === count($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This is Single Elimination Tournament, draw results are not possible!';
    }
}
