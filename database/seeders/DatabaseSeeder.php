<?php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LocationSeeder::class,
            RoomSeeder::class,
        ]);

        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'account_id' => 1,
            ]
        );

        // Ensure roles
        Bouncer::role()->firstOrCreate(
            ['name' => 'admin', 'scope' => 1],
            ['title' => 'Administrator']
        );
        Bouncer::role()->firstOrCreate(
            ['name' => 'user', 'scope' => 1],
            ['title' => 'Regular User']
        );

        // Ensure abilities
        Bouncer::ability()->firstOrCreate(
            ['name' => 'manage-users', 'scope' => 1],
            ['title' => 'Manage Users']
        );
        Bouncer::ability()->firstOrCreate(
            ['name' => 'book-rooms', 'scope' => 1],
            ['title' => 'Book Rooms']
        );
        Bouncer::ability()->firstOrCreate(
            ['name' => 'assign-role', 'scope' => 1],
            ['title' => 'Assign Role']
        );

        // Assign admin role and permissions
        Bouncer::scope()->to(1);
        Bouncer::assign('admin')->to($user);
        Bouncer::allow('admin')->to(['manage-users', 'book-rooms', 'assign-role']);
        Bouncer::allow($user)->to(['manage-users', 'book-rooms', 'assign-role']);

        Log::info('DatabaseSeeder::run - Seeded database with user, roles, and permissions', [
            'user_email' => $user->email,
            'roles' => ['admin', 'user'],
            'abilities' => ['manage-users', 'book-rooms', 'assign-role']
        ]);
    }
}