<?php

namespace App\Http\Controllers\Traits;

trait HerosValidate
{
    protected $firstNameEnum = [
        'Bheizer',
        'Khazun',
        'Grirgel',
        'Murgil',
        'Edraf',
        'En',
        'Grognur',
        'Grum',
        'Surhathion',
        'Lamos',
        'Melmedjad',
        'Shouthes',
        'Che',
        'Jun',
        'Rircurtun',
        'Zelen'
    ];

    protected $lastNameEnum = [
        'Nema',
        'Dhusher',
        'Burningsun',
        'Hawkglow',
        'Nav',
        'Kadev',
        'Lightkeeper',
        'Heartdancer',
        'Fivrithrit',
        'Suechit',
        'Tuldethatvo',
        'Vrovakya',
        'Hiao',
        'Chiay',
        'Hogoscu',
        'Vedrimor'
    ];

    protected $dwarfNames = array();

    public function getDwarfFirstName(){

        foreach($this->firstNameEnum as $index => $fName ){
            if (strpos($fName, 'r') !== false || strpos($fName, 'h') !== false){
                $this->dwarfNames[] = [
                    'name' => $fName
                ];
            }
        }
        return $this->dwarfNames;
    }
}
