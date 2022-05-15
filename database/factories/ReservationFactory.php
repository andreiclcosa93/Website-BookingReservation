<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date_ref=Carbon::createFromDate($this->faker->dateTimeBetween('- 3 month','now'));
        $date_checkin=Carbon::createFromDate($date_ref)->addDays(rand(1,9));
        $date_checkout=Carbon::createFromDate($date_checkin->addDays(rand(1,9)));
        return [
            'user_id'=>User::inRandomOrder()->first()->id,
            'room_id'=>Room::inRandomOrder()->first()->id,

            'created_at'=>$date_ref,
            'checkin_at'=>$this->faker->dateTimeBetween($date_ref, $date_checkin),
            'checkout_at'=>$date_checkout,
            'confirmed_at'=>$this->faker->randomElement([null, $date_ref->addDays(1,5)]),

            'observations'=>$this->faker->sentence(),


        ];
    }
}
