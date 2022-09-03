<?php

namespace Database\Factories;

use App\Models\NewsSubscription;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;


class NewsSubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NewsSubscription::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'last_verify_request_at' => null,
            'token' => hash('sha256', $plainTextToken = Str::random(64)),
        ];
    }
    /**
     * Indicate that the model's email address requested to be verified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function verify_request_now()
    {
        return $this->state(function (array $attributes) {
            return [
                'last_verify_request_at' => now(),
            ];
        });
    }
    /**
     * Indicate that the model's email address requested to be verified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function verify_request_3h_ago()
    {
        return $this->state(function (array $attributes) {
            return [
                'last_verify_request_at' => Carbon::now()->subHours(3),
            ];
        });
    }
}
