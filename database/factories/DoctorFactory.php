<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameMale().' '.$this->faker->firstNameMale(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender'=>'ذكر',
            'phone'=>$this->faker->phoneNumber(),
            'department_id'=>$this->faker->numberBetween(1,5),
        ];
    }
}
