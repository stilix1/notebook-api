<?php

namespace Database\Factories;

use App\Models\NotebookEntry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class NotebookEntryFactory extends Factory
{
    protected $model = NotebookEntry::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'company' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'birthdate' => $this->faker->date,
            'photo' => $this->faker->imageUrl,
        ];
    }
}

