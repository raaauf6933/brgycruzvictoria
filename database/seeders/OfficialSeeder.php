<?php

namespace Database\Seeders;

use App\Models\Official;
use App\Services\ActivityLogService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ActivityLogService $service)
    {
        $officials = array(

            // Punong Barangay
            [
                'id' => 1,
                'position_id' => 1, 
                'name' => 'Roy C. Pabustan', 
                'contact' => '09692324569',
                'is_active' => true,
                'created_at' => now()
            ],

            // Barangay Kagawad
            [
                'id' => 2,
                'position_id' => 2, 
                'name' => 'Angelito M. Baldonaza Sr.', 
                'contact' => '09301345654',
                'is_active' => true,
                'created_at' => now()
            ],

            // Sk Chairwoman
            [
                'id' => 3,
                'position_id' => 3, 
                'name' => 'Jenifer Kim V. Romero', 
                'contact' => '09774046759',
                'is_active' => true,
                'created_at' => now()
            ],

            // Barangay Treasurer
            [
                'id' => 4,
                'position_id' => 4, 
                'name' => 'Kristian Mae B. Sagun', 
                'contact' => '09237331787',
                'is_active' => true,
                'created_at' => now()
            ],

            // Barangay Secretary
            [
                'id' => 5,
                'position_id' => 5, 
                'name' => 'Conchita B. Ragadio', 
                'contact' => '09496339834',
                'is_active' => true,
                'created_at' => now()
            ],

            // Cheif Tanod
            [
                'id' => 6,
                'position_id' => 6, 
                'name' => 'Judy Valez', 
                'contact' => '09303960987',
                'is_active' => true,
                'created_at' => now()
            ],

            // Barangay Tanod
            [
                'id' => 7,
                'position_id' => 7, 
                'name' => 'Wilson Apolonio', 
                'contact' => '09120604378',
                'is_active' => true,
                'created_at' => now()
            ],
    

            // BHW
            [
                'id' => 8,
                'position_id' => 8, 
                'name' => 'Normita Dizon', 
                'contact' => '09305647848	',
                'is_active' => true,
                'created_at' => now()
            ],

            // Bns
            [
                'id' => 9,
                'position_id' => 9, 
                'name' => 'Marilou Castaneda', 
                'contact' => '09301198017	',
                'is_active' => true,
                'created_at' => now()
            ],

            // Day Care
            [
                'id' => 10,
                'position_id' => 10, 
                'name' => 'Irene A. Abalos', 
                'contact' => '09999592942	',
                'is_active' => true,
                'created_at' => now()
            ],

            // Utility/Tanod
            [
                'id' => 11,
                'position_id' => 11, 
                'name' => 'Rodrigo Carbonel', 
                'contact' => '09303960987	',
                'is_active' => true,
                'created_at' => now()
            ],
           

            // Lupon
            [
                'id' => 12,
                'position_id' => 12, 
                'name' => 'Marlon Apolonio', 
                'contact' => '09303960987	',
                'is_active' => true,
                'created_at' => now()
            ],

            // Brao
            [
                'id' => 13,
                'position_id' => 13, 
                'name' => 'Jimmy Sagun', 
                'contact' => '09303960987	',
                'is_active' => true,
                'created_at' => now()
            ],
        );

        Official::insert($officials);

        Official::all()->map(fn(
            $official) => $service->log_activity(model:$official, event:'added', model_name: 'Official', model_property_name: $official->name, conjunction:'an')
        );
    }
}
