<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Animal;
use App\Models\User;
class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->word,
            'species' => $this->faker->word,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'birthday' => $this->faker->date,
        ];
    }
}
