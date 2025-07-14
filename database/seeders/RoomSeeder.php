<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Executive Boardroom A',
                'location_id' => 1, // make sure this matches an existing location
                'capacity_min' => 10,
                'capacity_max' => 15,
                'price_per_hour' => 5000,
                'type' => 'Meeting Room',
                'image_url' => 'https://placehold.co/400x250',
                'features' => json_encode(['4K Display', 'Video Conferencing', 'Whiteboard', 'Coffee Service']),
                'description' => 'Premium boardroom with panoramic city views.',
                'rating' => 4.9,
                'reviews' => 128
            ],
            [
                'name' => 'Innovation Lab 1',
                'location_id' => 2,
                'capacity_min' => 15,
                'capacity_max' => 20,
                'price_per_hour' => 6500,
                'type' => 'Training Space',
                'image_url' => 'https://placehold.co/400x250',
                'features' => json_encode(['Interactive Displays', 'AR/VR Equipment', 'Modular Furniture', 'Tech Support']),
                'description' => 'Flexible space designed for workshops and innovative collaboration sessions.',
                'rating' => 4.8,
                'reviews' => 96
            ],
            [
                'name' => 'Focus Pod C',
                'location_id' => 1,
                'capacity_min' => 2,
                'capacity_max' => 4,
                'price_per_hour' => 2500,
                'type' => 'Meeting Room',
                'image_url' => 'https://placehold.co/400x250',
                'features' => json_encode(['HD Display', 'Sound Proofing', 'Ergonomic Seating', 'Climate Control']),
                'description' => 'Intimate meeting space perfect for focused discussions and small team meetings.',
                'rating' => 4.7,
                'reviews' => 64
            ],
        ]);
    }
}
