<?php

namespace Database\Factories;

use App\Models\Sighting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends Factory<Sighting>
 */
class SightingFactory extends Factory
{
    public function definition(): array
    {
        $craftTypes = ['disk', 'triangle', 'light', 'other'];

        return [
            'location'    => fake() -> city(),
            'craft_type'  => fake() -> randomElement($craftTypes),
            'identified'  => fake() -> boolean(),
            'description' => fake() -> optional() -> sentence(),
        ];
    }
}
