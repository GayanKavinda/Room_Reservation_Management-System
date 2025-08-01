<?php

/* database/seeders/LocationSeeder.php */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            ['name' => 'Colombo HQ'],
            ['name' => 'Digital Innovation Hub'],
            ['name' => 'Regional Office Kandy'],
            ['name' => 'Galle Innovation Center'],
            ['name' => 'Jaffna Tech Hub'],
        ]);
    }
}
