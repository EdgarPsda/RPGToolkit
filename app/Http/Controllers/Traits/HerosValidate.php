<?php

namespace App\Http\Controllers\Traits;

trait HerosValidate
{
    public function validateName($attributes = [])
    {
        if ($attributes->race == 'Elf') {
            
            $nameMirrored = strrev($attributes->name->firstName);
            return $nameMirrored;
         }
    }
}
