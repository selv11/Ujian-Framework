<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname'=>$this->faker->name(),
            'phone_number'=>$this->faker->phoneNumber(),
            'jobtitle'=>$this->faker->jobTitle(),
        ];
    }
}
