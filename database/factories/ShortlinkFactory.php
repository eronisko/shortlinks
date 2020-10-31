<?php

namespace Database\Factories;

use App\Models\Shortlink;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShortlinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shortlink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_id' => User::factory(),
            'path' => $this->faker->word,
            'long_url' => $this->faker->url,
        ];
    }
}
