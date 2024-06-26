<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\SalesRep;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public static $nameToDesc =
    [
        'Potash Alum/Potassium' => 'It is used to make plastics and pesticides.',
        'Frenchic Al Fresco Blackjack' => 'Bold, true black, water-based chalk paint.',
        'My Colour Durable Paint' => 'MY colour is a luxurious durable matt finish.',
        'Syn-Vital Probiotic' => 'Boost your animals vitality and digestive health.',
        'Emperor Masonry Paint' => 'Cutting-edge, silicone-based super hydrophobic masonry paint.',
        'Hematite' => 'It is used to produce pigments, preparations for heavy media.',
        'BIRDVITAL elderberry feed' => 'To support feed intake.',
        'Feedstim XP' => 'This outstanding natural liquid food is a highly effective.',
        'Advanced Nutrients Ignitor' => 'An innovative and top-quality additive, which helps your animals.',
        'White Vitriol' => 'It is used for preserving skins and wood.',
        'Hammerite Direct To Rust Metal' => 'Easy to use smooth gloss finish.',
        'Phosgene' => 'It is used to make plastics and pesticides.',
        'Wintergreen oil' => 'It is used in traditional medicine for the bacteria infection.',
        'Lick 05' => 'A stone white paint with warm yellow undertones.',
        'Valspar Premium Walls' => 'Valspar Simplicity Walls and Ceilings is a low splatter.',
        'Ad-herb Aqua Complete Pigeon' => 'Improve performance and condition. Support your birds immune system.',
        'Sal ammoniac' => 'It is used as cleaning agent in several industrial processes.',
        'Plaster of Paris' => 'It is used as a protective coating on walls and ceilings.'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->randomKey(self::$nameToDesc);
        return [
            'id' => 'P' . $this->faker->numberBetween(0, 99999),
            'name' => $name,
            'description' => self::$nameToDesc[$name],
            'price' => $this->faker->randomNumber(6),
            'volume' => $this->faker->randomNumber(2),
            'unit' => $this->faker->randomElement(['little', 'gallon']),
            'sales_rep_id' => SalesRep::inRandomOrder()->first()->id
        ];
    }
}
