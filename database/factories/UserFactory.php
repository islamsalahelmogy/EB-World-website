<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameFemale().' '.$this->faker->firstNameMale(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender'=> 'انثي' ,
            'phone'=>$this->faker->phoneNumber(),
            'department'=>$this->faker->randomElement(['قسم اللغة الانجليزية','قسم الحاسبات','قسم العلوم','قسم الرياضيات','قسم التاريخ']),
            'level'=>$this->faker->randomElement(['اولي','ثانية','ثالثة','رابعة']),
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
