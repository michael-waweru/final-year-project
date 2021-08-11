<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $location_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($location_name);
        $country = $this->faker->words($nb=1, $asText=true);
        $zip = $this->faker->numberBetween(2645,5000);
        $county = $this->faker->words($nb=2, $asText=true);
        return [
            'name' => $location_name,
            'slug' => $slug,
            'country' => $country,
            'zip' => $zip,
            'county' => $county
        ];
    }
}
