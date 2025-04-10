<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class OnlyThree implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $user = Auth::user();
        if(count($user->posts) >= 3){
            $fail('You can only create 3 posts.');
        }
    }
}
