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
    protected $dwarflNames = array();

    public function getDwarfFirstName()
    {

        foreach ($this->firstNameEnum as $fName) {
            if (strpos($fName, 'r') !== false || strpos($fName, 'h') !== false) {
                $this->dwarfNames[] = [
                    'value' => $fName,
                    'label' => $fName
                ];
            }
        }

        return $this->dwarfNames;
    }

    public function getDwarfLastName()
    {
        foreach ($this->lastNameEnum as $lName) {
            if (strpos($lName, 'r') !== false || strpos($lName, 'h') !== false || strpos($lName, 'H') !== false) {
                $this->dwarflNames[] = [
                    'lname' => $lName
                ];
            }
        }
        return $this->dwarflNames;
    }
}
