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

    protected $classes = [
        'Paladin',
        'Ranger',
        'Barbarian',
        'Wizard',
        'Cleric',
        'Warrior',
        'Thief'
    ];

    protected $weapons = [
        'Sword',
        'Dagger',
        'Hammer',
        'Bow and Arrows',
        'Staff'
    ];

    protected $dwarfNames = array();
    protected $dwarflNames = array();
    protected $specialClasses = array();
    protected $specialWeapon = array();

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
                    'value' => $lName,
                    'label' => $lName
                ];
            }
        }
        return $this->dwarflNames;
    }

    public function getClasses($race)
    {
        if ($race == 'Dwarf') {
            foreach ($this->classes as $class) {
                if ($class != 'Ranger' && $class != 'Wizard') {
                    $this->specialClasses[] = [
                        'value' => $class,
                        'label' => $class
                    ];
                }
            }
            return $this->specialClasses;
        } else {
            if ($race == 'Halfling' || $race == 'Elf') {
                foreach ($this->classes as $class) {
                    if ($class != 'Barbarian' && $class != 'Warrior') {
                        $this->specialClasses[] = [
                            'value' => $class,
                            'label' => $class
                        ];
                    }
                }
                return $this->specialClasses;
            } else {
                if ($race == 'Half-orc') {
                    foreach ($this->classes as $class) {
                        if ($class != 'Wizard' && $class != 'Cleric') {
                            $this->specialClasses[] = [
                                'value' => $class,
                                'label' => $class
                            ];
                        }
                    }
                    return $this->specialClasses;
                } else {
                    if ($race == 'Dragonborn') {
                        foreach ($this->classes as $class) {
                            if ($class != 'Cleric') {
                                $this->specialClasses[] = [
                                    'value' => $class,
                                    'label' => $class
                                ];
                            }
                        }
                        return $this->specialClasses;
                    }
                }
            }
        }
    }

    public function getWeaponsEnum($clas)
    {
        if ($clas == 'Barbarian') {
            foreach ($this->weapons as $weapon) {
                if ($weapon != 'Bow and Arrows' && $weapon != 'Staff') {
                    $this->specialWeapons[] = [
                        'value' => $weapon,
                        'label' => $weapon
                    ];
                }
            }
            return $this->specialWeapons;
        }

        if ($clas == 'Thief') {
            foreach ($this->weapons as $weapon) {
                if ($weapon != 'Hammer') {
                    $this->specialWeapons[] = [
                        'value' => $weapon,
                        'label' => $weapon
                    ];
                }
            }
            return $this->specialWeapons;
        }
    }
}
