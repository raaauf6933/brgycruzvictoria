<?php

namespace Database\Seeders;

use App\Models\Resident;
use App\Services\ActivityLogService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogService $service)
    {
        $residents = array(
            [
                'id' => 1,
                'purok_id' => mt_rand(1,4),
                'first_name' => 'Dev',
                'middle_name' => 'Dee',
                'last_name' => 'Ace', 
                'gender' => 'male',
                'birth_date' => '1998/01/01',
                'address' => 'Sample Address',
                'contact' => '09659312003',
                'civil_status' => 'single',
                'citizenship' => 'filipino',
                'is_voter' => mt_rand(1,2),
                'created_at' => now()
            ],
            [
                'id' => 2,
                'purok_id' => mt_rand(1,4),
                'first_name' => 'Angela',
                'middle_name' => 'A',
                'last_name' => 'Apolonio', 
                'gender' => 'female',
                'birth_date' => '1998/01/01',
                'address' => 'Sample Address',
                'contact' => '09686624094',
                'civil_status' => 'single',
                'citizenship' => 'filipino',
                'is_voter' => mt_rand(1,2),
                'created_at' => now()
            ],
            [
                'id' => 3,
                'purok_id' => mt_rand(1,4),
                'first_name' => 'Orvil Von',
                'middle_name' => 'C',
                'last_name' => 'Salagan', 
                'gender' => 'male',
                'birth_date' => '1998/01/01',
                'address' => 'Sample Address',
                'contact' => '09163969806',
                'civil_status' => 'single',
                'citizenship' => 'filipino',
                'is_voter' => mt_rand(1,2),
                'created_at' => now()
            ],
            [
                'id' => 4,
                'purok_id' => mt_rand(1,4),
                'first_name' => 'Orvil Von',
                'middle_name' => 'C',
                'last_name' => 'Salagan', 
                'gender' => 'male',
                'birth_date' => '1998/01/01',
                'address' => 'Sample Address',
                'contact' => '09163969806',
                'civil_status' => 'single',
                'citizenship' => 'filipino',
                'is_voter' => mt_rand(1,2),
                'created_at' => now()
            ],
            [
                'id' => 5,
                'purok_id' => mt_rand(1,4),
                'first_name' => 'Jhon Michael',
                'middle_name' => 'C',
                'last_name' => 'Cruz', 
                'gender' => 'male',
                'birth_date' => '1998/01/01',
                'address' => 'Sample Address',
                'contact' => '09471491598',
                'civil_status' => 'single',
                'citizenship' => 'filipino',
                'is_voter' => mt_rand(1,2),
                'created_at' => now()
            ],
            [
                'id' => 6,
                'purok_id' => mt_rand(1,4),
                'first_name' => 'Joshua',
                'middle_name' => 'M',
                'last_name' => 'Magalona', 
                'gender' => 'male',
                'birth_date' => '1998/01/01',
                'address' => 'Sample Address',
                'contact' => '09152066382',
                'civil_status' => 'single',
                'citizenship' => 'filipino',
                'is_voter' => mt_rand(1,2),
                'created_at' => now()
            ],
        );

        Resident::insert($residents);

        Resident::all()->map(fn(
            $resident) => $service->log_activity(model:$resident, event:'added', model_name: 'Resident', model_property_name: $resident->full_name)
        );
    }
}
