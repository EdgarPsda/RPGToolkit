<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
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
        return [
            'fname' => 'in:Bheizer,Khazun,Grirgel,Murgil,Edraf,En,Grognur,Grum,Surhathion,Lamos,
                            Melmedjad,Shouthes,Che,Jun,Rircurtun,Zelen|required',
            'lname' => 'in:Nema,Dhusher,Burningsun,Hawkglow,Nav,Kadev,Lightkeeper,Heartdancer,
                            Fivrithrit,Suechit,Tuldethatvo,Vrovakya,Hiao,Chiay,Hogoscu,Vedrimor',
            'level' => 'required',
            'race' => 'in:Human,Elf,Halfling,Dwarf,Half-orc,Half-elf,Dragonborn|required',
            'class' => 'in:Paladin,Ranger,Barbarian,Wizard,Cleric,Warrior,Thief|required',
            'weapon' => 'in:Sword,Dagger,Hammer,Bow and Arrows,Staff|required',
            'stats' => 'integer|required'
        ];
    }
}
