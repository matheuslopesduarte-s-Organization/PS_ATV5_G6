<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class UserTypeRules implements Rule
{
    public function passes($attribute, $value)
    {
        $birthDate = Carbon::parse($value);
        $age = $birthDate->age;

        return $age >= 0 && $age <= 120;
    }
    public function message()
    {
        return 'A data de nascimento é inválida.';
    }

    public static function getType($birthDate)
    {
        $age = Carbon::parse($birthDate)->age;

        if ($age < 12) {
            return 'child';
        } elseif ($age >= 12 && $age < 18) {
            return 'teen';
        } else {
            return 'adult';
        }
    }
}
