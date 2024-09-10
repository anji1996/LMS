<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            //admin
            [
                'name' => 'instructor',
                'role' => 'instructor',
                'email' => 'instructor@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now(),
            ],

            //user
            [
                'name' => 'student',
                'role' => 'student',
                'email' => 'student@gmail.com',
                'password' => Hash::make('87654321'),
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
