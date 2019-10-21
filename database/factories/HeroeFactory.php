<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Heroe;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Heroe::class, function (Faker $faker) {
    return [
        'fname' => $faker->randomElement(['Bheizer', 'Khazun', 'Grirgel', 'Murgil', 'Edraf', 'En', 'Grognur', 'Grum', 'Surhathion', 'Lamos',
                    'Melmedjad', 'Shouthes', 'Che', 'Jun', 'Rircurtun', 'Zelen']),
        'lname' => $faker->randomElement(['Nema', 'Dhusher', 'Burningsun', 'Hawkglow', 'Nav', 'Kadev', 'Lightkeeper', 'Heartdancer',
                    'Fivrithrit', 'Suechit', 'Tuldethatvo', 'Vrovakya', 'Hiao', 'Chiay', 'Hogoscu', 'Vedrimor']),
        'level' => 1,
        'race' => $faker->randomElement(['Human', 'Elf', 'Halfling', 'Dwarf', 'Half-orc', 'Half-elf', 'Dragonborn']),
        'class' => $faker->randomElement(['Paladin', 'Ranger', 'Barbarian', 'Wizard', 'Cleric', 'Warrior', 'Thief']),
        'weapon' => $faker->randomElement(['Sword', 'Dagger', 'Hammer', 'Bow and Arrows', 'Staff']),
        'stats' => $faker->numberBetween(0, 100),
    ];
});
