<?php

namespace Database\Factories;

use App\Models\Plant;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rooms = Room::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->name,
            'sciName' => $this->faker->name,
            'age' => $this->faker->randomDigit,
            'room_id' => $this->faker->randomElement($rooms)
        ];
    }
}
