<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type=$this->faker->randomElement(['admin','user']);
        return [
            'text' => $this->faker->randomElement(['هل توجد مواد اضافيه في قسم الرياضيات ؟','هل يمكنني ان التحق بقسم التاريخ ؟']),
            'type' => $type,
            'user_id' => $type=='user' ? $this->faker->numberBetween(1,10) :null,
            'admin_id'=> $type=='admin' ? $this->faker->numberBetween(1,3) :null,
        ];
    }
}
