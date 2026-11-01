<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lecturer::firstOrCreate(
            ['email' => 'bmutebi@phu.ac.ug'],
            [
                'full_name' => 'Mr. Mutebi Bashir',
                'department' => 'Business Computing',
            ]
        );

        Lecturer::firstOrCreate(
            ['email' => 'jdoe@phu.ac.ug'],
            [
                'full_name' => 'Dr. Jane Doe',
                'department' => 'Computer Science',
            ]
        );

        Lecturer::firstOrCreate(
            ['email' => 'joy@phu.ac.ug'],
            [
                'full_name' => 'Mrs. Joy',
                'department' => 'Business Computing',
            ]
        );

        Lecturer::firstOrCreate(
            ['email' => 'mosh@phu.ac.ug'],
            [
                'full_name' => 'Mr. Mosh',
                'department' => 'Business Computing',
            ]
        );
    }
}
