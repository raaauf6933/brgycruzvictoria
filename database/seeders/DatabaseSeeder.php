<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Run Seeders
       
        $this->call([
            RoleSeeder::class,
            AnnouncementSeeder::class,
            BlotterSeeder::class,
            ServicesSeeder::class,
            PurokSeeder::class,
            ResidentSeeder::class,
            UserSeeder::class,
            PositionSeeder::class,
            OfficialSeeder::class,
            RequestSeeder::class,
        ]);

    }
}
