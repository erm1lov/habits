<?php

namespace Database\Factories;

use App\Models\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Habit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lang = $this->faker->randomElement(['en', 'ru', 'sp', 'cn', 'nl', 'fr', 'de', 'kr', 'it', 'ge']);
        $title = $this->faker->word;

        return [
            'title' => ucfirst($title).' '.strtoupper($lang),
            'photo_name' => $title.$this->faker->randomNumber,
            'photo_ext' => $this->faker->randomElement(['jpeg', 'png', 'gif']),
            'is_active' => $this->faker->randomElement([true, false, true, true, true]),
            'lang' => $lang,
        ];
    }
}
