<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($type_name);

        return [
            'name' => $type_name,
            'slug' => $slug
        ];
    }
}
