<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;


class BS64ValidRule implements Rule
{
  
    public function passes($attribute, $value)
    {
        if (!preg_match('/^data:image\/(\w+);base64,/', $value, $type)) {
            return false;
        }

        $data = substr($value, strpos($value, ',') + 1);
        
        $data = base64_decode($data, true);

        if ($data === false) {
            return false;
        }
        $allowedTypes = ['jpeg', 'png', 'gif', 'bmp', 'webp', 'svg', 'tiff', 'jpg'];
        if (!in_array(strtolower($type[1]), $allowedTypes)) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return 'O campo :attribute não contém uma imagem válida.';
    }

}
