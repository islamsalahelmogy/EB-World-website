<?php

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type= 'admin';
        return [
            'text' => 'نعم يمكنك ',
            'type' => $type,
            'user_id' => $type=='user' ? $this->faker->numberBetween(1,10) :null,
            'admin_id' =>$type=='admin' ? $this->faker->numberBetween(1,3) :null,
            'inquire_id'=>Inquiry::all()->random()->id
        ];
    }
}
