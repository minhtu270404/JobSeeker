<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = $this->faker->firstName('male');
        $lastName = $this->faker->lastName;
        
        $emailSlug = Str::slug($lastName . $firstName, '');
        $email = strtolower($emailSlug) . '@example.com';

       
        $phone = '0' . $this->faker->numberBetween(3, 9) . $this->faker->numberBetween(10000000, 99999999);

        return [
            'username'          => strtolower($emailSlug) . rand(10,99),
            'phone'             => $phone,
            'email'             => $email,
            'email_verified_at' => now(),
            'password'          => bcrypt('password'), 
            'first_name'        => $firstName,
            'last_name'         => $lastName,
            'photo'             => null,
            'address'           => $this->faker->address,
            'gender'            => $this->faker->randomElement(['male', 'female']),
            'birthday'          => $this->faker->date('Y-m-d', '2000-01-01'),
            'is_active'         => $this->faker->boolean(90),
            'is_delete'         => false,
            'group_role'        => $this->faker->randomElement(['admin', 'user', 'editor']),
            'otp_code'          => $this->faker->numerify('######'),
            'otp_expires_at'    => now()->addMinutes(5),
            'otp_attempts'      => $this->faker->numberBetween(0, 3),
            'otp_context'       => $this->faker->randomElement(['register', 'login', 'reset_password']),
            'last_login_ip'     => $this->faker->ipv4,
            'last_login_at'     => now(),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
