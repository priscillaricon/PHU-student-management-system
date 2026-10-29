<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lecturer;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Lecturer::create([
            'full_name' => 'Mr. Mutebi Bashir',
            'email' => 'bmutebi@phu.ac.ug',
            'department' => 'Business Computing',
        ]);

        Lecturer::create([
            'full_name' => 'Dr. Jane Doe',
            'email' => 'jdoe@phu.ac.ug',
            'department' => 'Computer Science',
        ]);

          Lecturer::create([
            'full_name' => 'Mrs. Joy',
            'email' => 'joy@phu.ac.ug',
            'department' => 'Business Computing',
        ]);

          Lecturer::create([
            'full_name' => 'Mr. Mosh',
            'email' => 'mosh@phu.ac.ug',
            'department' => 'Business Computing',
        ]);


    }
}
