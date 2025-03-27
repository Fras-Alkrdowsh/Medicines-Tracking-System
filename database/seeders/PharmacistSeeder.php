<?php

namespace Database\Seeders;

use App\Models\Pharmacist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PharmacistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pharmacist::create([
            'name' => 'صيدلية شارع بغداد',
            'email' => 'pharmacist@gmail.com',
            'password' =>Hash::make('pharmacist'),
            'phone'=>'0999999999',
            'address'=>'شارع بغداد',
            'latitude'=>'33.51924797645315',
            'longitude'=>'36.30603146246282',
            'status'=>'enable',

            'certificateId'=>rand(),
        ]);
    }
}
