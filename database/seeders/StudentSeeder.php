<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::firstOrCreate(
            ['reg_no' => '23/U/1234/EVE'],
            [
                'full_name' => 'Priscillar Nakabugo',
                'email' => 'priscillar@phu.ac.ug',
                'program' => 'Bachelor of Business Computing',
            ]
        );

        Student::firstOrCreate(
            ['reg_no' => '24/U/18757/EVE'],
            [
                'full_name' => 'Namusobya Kautharah',
                'email' => 'kautharah@phu.ac.ug',
                'program' => 'Bachelor of Business Computing',
            ]
        );

        Student::firstOrCreate(
            ['reg_no' => '24/U/0395'],
            [
                'full_name' => 'Ganda Jude',
                'email' => 'jude@phu.ac.ug',
                'program' => 'Bachelor of Business Computing',
            ]
        );

        Student::firstOrCreate(
            ['reg_no' => '24/U/16323/EVE'],
            [
                'full_name' => 'Kyagulanyi Maurice',
                'email' => 'maurice@phu.ac.ug',
                'program' => 'Bachelor of Business Computing',
            ]
        );

        Student::firstOrCreate(
            ['reg_no' => '24/U/18976/EVE'],
            [
                'full_name' => 'Mutesi Suzan',
                'email' => 'suzan@phu.ac.ug',
                'program' => 'Bachelor of Business Computing',
            ]
        );
    }
}
