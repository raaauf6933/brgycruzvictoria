<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use App\Models\User;
use App\Services\ActivityLogService;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogService $service)
    {
        $users = array(
            // generate sample admin
             [
                'id' => 1,
                 'resident_id' => null,
                 'email' => 'admin@gmail.com', 
                 'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
                 'is_activated' => true, 
                 'role_id' => Role::ADMIN,
                 'created_at' => now()
             ],
 
           // generate sample residents
             [
                'id' => 2,
                'resident_id' => 1,
                 'email' => 'imdevaes@gmail.com', 
                 'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
                 'is_activated' => true, 
                 'role_id' => Role::RESIDENT,
                 'created_at' => now()
             ],
             [
                'id' => 3,
                'resident_id' => 2,
                 'email' => 'apolonio.angela@ue.edu.ph', 
                 'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
                 'is_activated' => true, 
                 'role_id' => Role::RESIDENT,
                 'created_at' => now()
             ],
             [
                'id' => 4,
                'resident_id' => 3,
                 'email' => 'salagan.orvilvon@ue.edu.ph', 
                 'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
                 'is_activated' => true, 
                 'role_id' => Role::RESIDENT,
                 'created_at' => now()
             ],
             [
                'id' => 5,
                'resident_id' => 4,
                 'email' => 'cruz.jhonmichael@ue.edu.ph', 
                 'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
                 'is_activated' => true, 
                 'role_id' => Role::RESIDENT,
                 'created_at' => now()
             ],
             [
                'id' => 6,
                'resident_id' => 5,
                 'email' => 'magalona.joshua@ue.edu.ph', 
                 'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
                 'is_activated' => true, 
                 'role_id' => Role::RESIDENT,
                 'created_at' => now()
             ],
          );
 
          User::insert($users);

          User::all()->each(function($user) {
            $user
            ->addMedia(public_path("/img/tmp_files/avatars/$user->id.png"))
            ->preservingOriginal()
            ->toMediaCollection('avatar_image');
        });

        $service->log_activity(model: User::find(1), event:'seeded', model_name: 'User Account', model_property_name: 'seeded users');

    }
}
