<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $property_name = $this->faker->unique()->words($nb=4, $asText=true);
        $slug = Str::slug($property_name);
        $location = Location::count() >= 5 ? Location::inRandomOrder()->first()->id: Location::factory();
        $location_name = Location::count() >= 5 ? Location::inRandomOrder()->first()->name: Location::factory();
        $property_type = PropertyType::count() >= 4 ? PropertyType::inRandomOrder()->first()->id : PropertyType::factory();
        $property_type_name = PropertyType::count() >= 4 ? PropertyType::inRandomOrder()->first()->name: PropertyType::factory();
        return [
            'name' => $property_name,
            'slug' => $slug,
            'description' => $this->faker->text(600),
            'price' => $this->faker->numberBetween(5000,25000),
            // 'SKU' => 'property' . $this->faker()->unique()->numberBetween(50,110),
            'status' => 'Rent',
            'bedrooms' => $this->faker->numberBetween(1,5),
            'garage' => 'avalable',
            'year_built' => $this->faker->date("y-m-d"),
            'image' => 'property_'.$this->faker->numberBetween(1,10).'.jpg',
            'location_id' => $location,
            'property_type_id' => $property_type,
            'precise_location' => $this->faker->words($nb=4, $asText=true),
            'school' => $this->faker->words($nb=4, $asText=true),
            'medical' => $this->faker->words($nb=4, $asText=true),
            'church' => $this->faker->words($nb=4, $asText=true),
            'landlord' => $this->faker->words($nb=2, $asText=true)
        ];
    }
}
