<?php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LocationSeeder::class,
            RoomSeeder::class,
        ]);

        // Ensure only one user with test@example.com
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'account_id' => 1,
            ]
        );

        // Ensure only one admin role
        Bouncer::role()->firstOrCreate(
            ['name' => 'admin', 'scope' => 1],
            ['title' => 'Administrator']
        );

        // Ensure only one user role
        Bouncer::role()->firstOrCreate(
            ['name' => 'user', 'scope' => 1],
            ['title' => 'Regular User']
        );

        // Ensure only one manage-users ability
        Bouncer::ability()->firstOrCreate(
            ['name' => 'manage-users', 'scope' => 1],
            ['title' => 'Manage Users']
        );

        // Ensure only one book-rooms ability
        Bouncer::ability()->firstOrCreate(
            ['name' => 'book-rooms', 'scope' => 1],
            ['title' => 'Book Rooms']
        );

        // Assign admin role to user
        Bouncer::scope()->to(1);
        Bouncer::assign('admin')->to($user);

        // Assign permissions to admin role
        Bouncer::allow('admin')->to('manage-users');
        Bouncer::allow('admin')->to('book-rooms');

        // Assign permissions directly to the user
        Bouncer::allow($user)->to('manage-users');
        Bouncer::allow($user)->to('book-rooms');
    }
}