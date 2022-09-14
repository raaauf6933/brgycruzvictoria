<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requests = array(

            // barangay clearance
            [
                'id' => 1,
                'user_id' => 2,
                'service_id' => 1,
                'purpose' => 'Job Requirement',
                'business_name' => null,
                'residency_year' => null,
                'resident_type' => null,
                'status' => 0,
                'created_at' => now()
            ],

            //Certificate of Indigency
            [
                'id' => 2,
                'user_id' => 2,
                'service_id' => 2,
                'purpose' => 'Job Requirement',
                'business_name' => null,
                'residency_year' => null,
                'resident_type' => null,
                'status' => 0,
                'created_at' => now()
            ],

            //Certificate of Residency
            [
                'id' => 3,
                'user_id' => 2,
                'service_id' => 3,
                'purpose' => 'Job Requirement',
                'business_name' => null,
                'residency_year' => '15',
                'resident_type' => 'permanent resident',
                'status' => 0,
                'created_at' => now()
            ],

            //Barangay Business Clearance
            [
                'id' => 4,
                'user_id' => 2,
                'service_id' => 4,
                'purpose' => 'Job Requirement',
                'business_name' => 'Dev Halo-Halo',
                'residency_year' => null,
                'resident_type' => null,
                'status' => 0,
                'created_at' => now()
            ],
        );

        Request::insert($requests);
    }
}
