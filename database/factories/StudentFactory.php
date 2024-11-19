<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'telegram_id' => null, // Telegram ID залишається пустим
            'activation_code' => $this->generateActivationCode(),
        ];
    }

    /**
     * Generate a unique 5-digit activation code.
     *
     * @return string
     */
    private function generateActivationCode()
    {
        do {
            $code = str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (Student::where('activation_code', $code)->exists());

        return $code;
    }
}
