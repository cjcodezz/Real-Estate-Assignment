<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    public function definition()
    {
        $types = ['Flat', 'Villa', 'Plot'];
        
        return [
            'name' => $this->faker->unique()->sentence(3),
            'type' => $this->faker->randomElement($types),
            'price' => $this->faker->numberBetween(500000, 50000000),
            'area_sqft' => $this->faker->numberBetween(500, 10000),
            'address' => $this->faker->address,
            'description' => $this->faker->paragraphs(3, true),
            'image_path' => 'uploads/property-'.$this->faker->unique()->numberBetween(1, 20).'.jpg',
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}